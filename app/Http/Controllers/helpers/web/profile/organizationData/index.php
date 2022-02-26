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

function DB_getUserOrganizationItem($userId, $organizationId)
{
    try {
        return Organization::where([
            ['user_id', $userId],
            ['id', $organizationId],
        ])->first()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_getUserOrganizationsList()
{
    try {
        return Organization::where('user_id', Auth::user()->id)->get()->toArray();
    } catch(\Exception $err) {
        return abort(500);
    }
}

function DB_updateOrganizationData($userId, $organizationId, $data) {
    try {
        Organization::where([
            ['user_id', $userId],
            ['id', $organizationId]
        ])->update($data);
    } catch(\Exception $err) {
        abort(500);
    }
}

function getOrganizationAssetPath($organizationId, $pathName) {
    return $path = 'organization/' . $organizationId . '/' . $pathName;
}

function getOrganizationDataFormatted()
{
    $userOrganizationList = DB_getUserOrganizationsList();

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
        $newPhotos = STORAGE_saveOrganizationAssets($userId, $organizationId, $requestPhotoArray, 'photo');
    }

    $requestCertificateArray = getFilesArray($request, 'certificate', 5);
    $newCertificates = [];

    if(!empty($requestCertificateArray)) {
        $newCertificates = STORAGE_saveOrganizationAssets($userId, $organizationId, $requestCertificateArray, 'certificate');
    }

    return array_merge(
        ...$newCertificates,
        ...$newPhotos,
    );
}

function getOrganizationItemDataFormatted($organizationId)
{
    $authUser = Auth::user();
    $userId = $authUser->id;

    $userOrganizationItemData = DB_getUserOrganizationItem($userId, $organizationId);
    $userOrganizationItemData['photoArray'] = getAssetArrayFormatted($userOrganizationItemData, 'photo', 3);
    $userOrganizationItemData['certificateArray'] = getAssetArrayFormatted($userOrganizationItemData, 'certificate', 5);

    return $userOrganizationItemData;
}

function STORAGE_saveOrganizationAssets($userId, $createdOrganizationId, $requestAssetsArray, $pathName)
{
    $path = getOrganizationAssetPath($createdOrganizationId, $pathName);

    return STORAGE_saveAssetList($userId, $requestAssetsArray, $path, $pathName);
}

function STORAGE_updateOrganizationAssets($userId, $organizationId, $request, $name, $count)
{
    $path = getOrganizationAssetPath($organizationId, $name);

    return STORAGE_updateAssetList($userId, $request, $name, $count, $path);
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

    DB_updateOrganizationData($authUserId, $createdOrganizationId, $imagesArray);

    return true;
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

function tryUpdateOrganizationDataInDB($request, $organizationId) {
    $authUser = Auth::user();
    $authUserId = $authUser->id;

    $data = [
        'title' => $request->input('title') ?? '',
        'inn' => $request->input('inn') ?? '',
        'legal_address' => $request->input('legal_address') ?? '',
        'real_address' => $request->input('real_address') ?? '',
        'email' => $request->input('email') ?? '',
        'phone' => $request->input('phone') ?? '',
        'user_id' => $authUserId,
    ];

    $updatedPhotoList = STORAGE_updateOrganizationAssets($authUserId, $organizationId, $request, 'photo', 3);
    $updatedCertificateList = STORAGE_updateOrganizationAssets($authUserId, $organizationId, $request, 'certificate', 5);

    $newOrganizationData = array_merge(
        $data,
        $updatedPhotoList,
        $updatedCertificateList,
    );

    DB_updateOrganizationData($authUserId, $organizationId, $newOrganizationData);

    return true;
}
