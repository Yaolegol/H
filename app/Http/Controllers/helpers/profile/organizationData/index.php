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

function getOrganizationDataFormatted()
{
    $defaultOrganizationData = array(
        'title' => '',
        'inn' => '',
        'legal_address' => '',
        'real_address' => '',
        'email' => '',
        'phone' => '',
        'certificate_1' => '',
        'certificate_2' => '',
        'certificate_3' => '',
        'certificate_4' => '',
        'certificate_5' => '',
        'photo_1' => '',
        'photo_2' => '',
        'photo_3' => '',
    );

    $authUser = Auth::user();
    $authUserId = $authUser->id;

    $userOrganizationData = getUserOrganization($authUserId);
    $userOrganizationDataFormatted = array_merge($defaultOrganizationData, ...$userOrganizationData);

    $certificateInputsIteration = 1;
    while ($certificateInputsIteration <= 5) {
        $currentCertificateName = 'certificate_' . $certificateInputsIteration;
        $currentCertificateValue = $userOrganizationDataFormatted[$currentCertificateName];

        if ($currentCertificateValue) {
            $path = str_replace('public/', '', $currentCertificateValue);

            $userOrganizationDataFormatted[$currentCertificateName] = '/storage/' . $path;
        }

        $certificateInputsIteration++;
    }

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $currentPhotoName = 'photo_' . $photoInputsIteration;
        $currentPhotoValue = $userOrganizationDataFormatted[$currentPhotoName];

        if ($currentPhotoValue) {
            $path = str_replace('public/', '', $currentPhotoValue);

            $userOrganizationDataFormatted[$currentPhotoName] = '/storage/' . $path;
        }

        $photoInputsIteration++;
    }


    return $userOrganizationDataFormatted;
}

function getUserOrganization($id)
{
    return Organization::where('user_id', $id)->get()->toArray();
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

function updateOrganizationCertificates($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $certificateArray = [];

    $certificateInputsIteration = 1;
    while ($certificateInputsIteration <= 5) {
        $certificateDBColumn = 'certificate_' . $certificateInputsIteration;
        $certificate = $request->file('certificate' . '_' . $certificateInputsIteration) ?? '';

        if ($certificate) {
            $certificateName = $authUserId . '_' . $certificateInputsIteration . '.' . $certificate->extension();

            $certificatePath = $certificate->storeAs(
                '/public/users/1/organization/certificate', $certificateName
            );

            array_push($certificateArray, [
                $certificateDBColumn => $certificatePath
            ]);
        } else {
            $remove_certificate_file_name = $request->has('remove_certificate_' . $certificateInputsIteration) ?? false;

            if ($remove_certificate_file_name) {
                $oldAvatarsArray = File::glob(storage_path() . '/app/public/users/' . $authUserId . 'organization/photo/' . $authUserId . '_' . $certificateInputsIteration . '.*');
                File::delete($oldAvatarsArray);

                array_push($certificateArray, [
                    $certificateDBColumn => ''
                ]);
            }
        }

        $certificateInputsIteration++;
    }

    return $certificateArray;
}

function updateOrganizationPhotos($request)
{
    $authUser = Auth::user();
    $authUserId = $authUser->id;
    $photosArray = [];

    $photoInputsIteration = 1;
    while ($photoInputsIteration <= 3) {
        $photoDBColumn = 'photo_' . $photoInputsIteration;
        $photo = $request->file('photo' . '_' . $photoInputsIteration) ?? '';

        if ($photo) {
            $photoName = $authUserId . '_' . $photoInputsIteration . '.' . $photo->extension();

            $photoPath = $photo->storeAs(
                '/public/users/1/organization/photo', $photoName
            );

            array_push($photosArray, [
                $photoDBColumn => $photoPath
            ]);
        } else {
            $remove_photo_file_name = $request->has('remove_photo_' . $photoInputsIteration) ?? false;

            if ($remove_photo_file_name) {
                $oldAvatarsArray = File::glob(storage_path() . '/app/public/users/' . $authUserId . 'organization/photo/' . $authUserId . '_' . $photoInputsIteration . '.*');
                File::delete($oldAvatarsArray);

                array_push($photosArray, [
                    $photoDBColumn => ''
                ]);
            }
        }

        $photoInputsIteration++;
    }

    return $photosArray;
}
