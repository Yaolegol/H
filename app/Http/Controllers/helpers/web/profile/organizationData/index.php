<?php

use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

function createOrganizationCertificates($request, $createdOrganizationId)
{
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 5) {
        $photoDBColumn = 'certificate_' . $photoInputsIteration;
        $photo = $request->file('certificate' . '_' . $photoInputsIteration) ?? '';
        if ($photo) {
            $photoName = $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/organization/' . $createdOrganizationId . '/certificate', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        }

        $photoInputsIteration++;
    }

    return array_merge(...$photosArray);
}

function createOrganizationPhotos($request, $createdOrganizationId)
{
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';
        if ($photo) {
            $photoName = $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/organization/' . $createdOrganizationId . '/photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        }

        $photoInputsIteration++;
    }

    return array_merge(...$photosArray);
}

function DB_getUserOrganization()
{
    try {
        return Organization::where('user_id', Auth::user()->id)->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
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

function tryStoreOrganizationDataDataInDB($request) {
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $title = $request->input('title') ?? '';
        $inn = $request->input('inn') ?? '';
        $legal_address = $request->input('legal_address') ?? '';
        $real_address = $request->input('real_address') ?? '';
        $email = $request->input('email') ?? '';
        $phone = $request->input('phone') ?? '';

        $createdOrganization = Organization::create([
            'title' => $title,
            'inn' => $inn,
            'legal_address' => $legal_address,
            'real_address' => $real_address,
            'email' => $email,
            'phone' => $phone,
            'user_id' => $authUserId,
        ]);

        $createdOrganizationData = $createdOrganization->toArray();
        $createdOrganizationId = $createdOrganizationData['id'];

        $newPhotos = createOrganizationPhotos($request, $createdOrganizationId);
        $newCertificates = createOrganizationCertificates($request, $createdOrganizationId);

        $newOrganizationImages = array_merge(
            $newCertificates,
            $newPhotos
        );

        Organization::where([
            ['user_id', $authUserId],
            ['id', $createdOrganizationId]
        ])->update($newOrganizationImages);

        return true;
    } catch (\Exception $error) {
        dd($error);
        return false;
    }
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
