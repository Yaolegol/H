<?php

use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function DB_createOrganization($request, $authUserId) {
    try {
        $data = [
            'email' => $request->input('email') ?? '',
            'inn' => $request->input('inn') ?? '',
            'legal_address' => $request->input('legal_address') ?? '',
            'phone' => $request->input('phone') ?? '',
            'real_address' => $request->input('real_address') ?? '',
            'title' => $request->input('title') ?? '',
            'user_id' => $authUserId,
        ];

        return Organization::create($data)->toArray();
    } catch (\Exception $error) {
        return abort(500);
    }
}

function DB_getUserOrganization()
{
    try {
        return Organization::where('user_id', Auth::user()->id)->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_updateOrganizationImages($userId, $organizationId, $imagesArray) {
    try {
        Organization::where([
            ['user_id', $userId],
            ['id', $organizationId]
        ])->update($imagesArray);
    } catch(\Exception $err) {
        abort(500);
    }
}

function getOrganizationDataFormatted()
{
    $userOrganizationList = DB_getUserOrganization();

    foreach ($userOrganizationList as &$userOrganizationItem) {
        $userOrganizationItem['certificateArray'] = getAssetArrayFormatted($userOrganizationItem, 'certificate', 5);
        $userOrganizationItem['photoArray'] = getAssetArrayFormatted($userOrganizationItem, 'photo', 3);
    }

    return $userOrganizationList;
}

function getOrganizationImagesData($request, $userId, $organizationId) {
    $requestPhotoArray = getFilesArray($request, 'photo', 3);
    $newPhotos = [];

    if(!empty($requestPhotoArray)) {
        $newPhotos = STORE_saveOrganizationAssets($userId, $organizationId, $requestPhotoArray, 'photo');
    }

    $requestCertificateArray = getFilesArray($request, 'certificate', 5);
    $newCertificates = [];

    if(!empty($requestCertificateArray)) {
        $newCertificates = STORE_saveOrganizationAssets($userId, $organizationId, $requestCertificateArray, 'certificate');
    }

    return array_merge(
        ...$newCertificates,
        ...$newPhotos,
    );
}

function getOrganizationItemDataFormatted($id)
{
    $userOrganizationItemData = getUserOrganizationItem($id);

    $photoIteration = 1;
    while ($photoIteration <= 3) {
        $currentPhotoName = 'photo_' . $photoIteration;
        $currentPhotoValue = $userOrganizationItemData[$currentPhotoName];

        if ($currentPhotoValue) {
            $path = str_replace('public/', '', $currentPhotoValue);
            $userOrganizationItemData[$currentPhotoName] = '/storage/' . $path;
        }

        $photoIteration++;
    }

    $certificateIteration = 1;
    while ($certificateIteration <= 5) {
        $currentPhotoName = 'certificate_' . $certificateIteration;
        $currentPhotoValue = $userOrganizationItemData[$currentPhotoName];

        if ($currentPhotoValue) {
            $path = str_replace('public/', '', $currentPhotoValue);
            $userOrganizationItemData[$currentPhotoName] = '/storage/' . $path;
        }

        $certificateIteration++;
    }

    return $userOrganizationItemData;
}

function getUserOrganizationItem($id)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    return Organization::where([
        ['user_id', $user_id],
        ['id', $id],
    ])->first()->toArray();
}

function STORE_saveOrganizationAssets($userId, $createdOrganizationId, $requestAssetsArray, $pathName)
{
    $path = 'organization/' . $createdOrganizationId . '/' . $pathName;

    return STORE_assetList($userId, $requestAssetsArray, $path, $pathName);
}

function tryChangeOrganizationDataInDB($request)
{
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $title = $request->input('title') ?? '';
        $inn = $request->input('inn') ?? '';
        $legal_address = $request->input('legal_address') ?? '';
        $real_address = $request->input('real_address') ?? '';
        $email = $request->input('email') ?? '';
        $phone = $request->input('phone') ?? '';

        $newCertificates = updateOrganizationCertificates($request);
        $newPhotos = updateOrganizationPhotos($request);

        $newOrganizationData = array_merge(
            [
                'title' => $title,
                'inn' => $inn,
                'legal_address' => $legal_address,
                'real_address' => $real_address,
                'email' => $email,
                'phone' => $phone,
                'user_id' => $authUserId,
            ],
            ...$newCertificates,
            ...$newPhotos
        );

        Organization::updateOrCreate(
            ['user_id' => $authUserId],
            $newOrganizationData,
        );

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function tryStoreOrganizationData($request) {
    $authUser = Auth::user();
    $authUserId = $authUser->id;

    $createdOrganizationData = DB_createOrganization($request, $authUserId);
    $createdOrganizationId = $createdOrganizationData['id'];
    $imagesArray = getOrganizationImagesData($request, $authUserId, $createdOrganizationId);

    DB_updateOrganizationImages($authUserId, $createdOrganizationId, $imagesArray);

    return true;
}

function updateOrganizationCertificates($request, $updatingOrganizationId)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;
    $certificatesArray = [];

    $certificateInputsIteration = 1;
    while ($certificateInputsIteration <= 3) {
        $certificateDBColumn = 'certificate_' . $certificateInputsIteration;
        $certificate = $request->file('certificate' . '_' . $certificateInputsIteration) ?? '';
        if ($certificate) {
            $oldCertificate = File::glob(
                storage_path() .
                '/app/public/users/' .
                $user_id .
                '/organization/' .
                $updatingOrganizationId .
                '/certificate/' .
                $certificateInputsIteration .
                '*'
            );
            File::delete($oldCertificate);

            $certificateName = $certificateInputsIteration . '.' . $certificate->extension();

            $certificatePath = $certificate->storeAs(
                '/public/users/1/organization/' . $updatingOrganizationId . '/certificate', $certificateName
            );

            array_push($certificatesArray, [
                $certificateDBColumn => $certificatePath
            ]);
        } else {
            $isRemoveCertificate = $request->has('remove_certificate_' . $certificateInputsIteration);

            if ($isRemoveCertificate) {
                $olCertificate = File::glob(
                    storage_path() .
                    '/app/public/users/' .
                    $user_id .
                    '/organization/' .
                    $updatingOrganizationId .
                    '/certificate/' .
                    $certificateInputsIteration .
                    '*'
                );
                File::delete($olCertificate);

                array_push($certificatesArray, [
                    $certificateDBColumn => ''
                ]);
            }
        }

        $certificateInputsIteration++;
    }

    return $certificatesArray;
}

function updateOrganizationPhotos($request, $updatingOrganizationId)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';
        if ($photo) {
            $oldPhoto = File::glob(
                storage_path() .
                '/app/public/users/' .
                $user_id .
                '/organization/' .
                $updatingOrganizationId .
                '/photo/' .
                $photoInputsIteration .
                '*'
            );
            File::delete($oldPhoto);

            $photoName = $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/organization/' . $updatingOrganizationId . '/photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        } else {
            $isRemovePhoto = $request->has('remove_photo_' . $photoInputsIteration);

            if ($isRemovePhoto) {
                $oldPhoto = File::glob(
                    storage_path() .
                    '/app/public/users/' .
                    $user_id .
                    '/organization/' .
                    $updatingOrganizationId .
                    '/photo/' .
                    $photoInputsIteration .
                    '*'
                );
                File::delete($oldPhoto);

                array_push($photosArray, [
                    $photoDBColumn => ''
                ]);
            }
        }

        $photoInputsIteration++;
    }

    return $photosArray;
}

function tryDestroyOrganizationDataInDB($id)
{
    try {
        $authUser = Auth::user();
        $user_id = $authUser->id;

        File::deleteDirectory(
            storage_path() .
            '/app/public/users/' .
            $user_id .
            '/organization/' .
            $id
        );

        $organization = Organization::where([
            ['user_id', $user_id],
            ['id', $id]
        ]);

        $organization->delete();

        return true;
    } catch (\Exception $error) {
        return false;
    }
}

function tryUpdateOrganizationDataInDB($request, $id) {
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $title = $request->input('title') ?? '';
        $inn = $request->input('inn') ?? '';
        $legal_address = $request->input('legal_address') ?? '';
        $real_address = $request->input('real_address') ?? '';
        $email = $request->input('email') ?? '';
        $phone = $request->input('phone') ?? '';

        $newCertificates = updateOrganizationCertificates($request, $id);
        $newPhotos = updateOrganizationPhotos($request, $id);

        $newOrganizationData = array_merge(
            [
                'title' => $title,
                'inn' => $inn,
                'legal_address' => $legal_address,
                'real_address' => $real_address,
                'email' => $email,
                'phone' => $phone,
                'user_id' => $authUserId,
            ],
            ...$newCertificates,
            ...$newPhotos,
        );

        Organization::where([
            ['user_id', $authUserId],
            ['id', $id]
        ])->update($newOrganizationData);

        return true;
    } catch (\Exception $error) {
        return false;
    }
}
