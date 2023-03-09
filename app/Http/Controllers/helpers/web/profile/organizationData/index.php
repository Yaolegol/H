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

function DB_destroyOrganizationItem($user_id, $organizationId) {
    try {
        $organization = Organization::where([
            ['user_id', $user_id],
            ['id', $organizationId]
        ]);

        $organization->delete();
    } catch(\Exception $err) {
        abort(500);
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

function DB_getUserOrganizationsList($isApproved = false)
{
    try {
        $authUser = Auth::user();
        $authUserId = $authUser->id;

        $filter = [
            ['user_id', $authUserId],
        ];

        if($isApproved) {
            array_push($filter, [
                'is_approved', 1
            ]);
        }

        return Organization::where($filter)->get()->toArray();
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

function formatOrganizationListItemsAssetsPath(&$organizationList) {
    foreach ($organizationList as &$userOrganizationItem) {
        $userOrganizationItem['certificateArray'] = getAssetArrayFormatted($userOrganizationItem, 'certificate', 5);
        $userOrganizationItem['photoArray'] = getAssetArrayFormatted($userOrganizationItem, 'photo', 3);
    }
}

function getOrganizationAssetPath($organizationId, $pathName) {
    return 'organization/' . $organizationId . '/' . $pathName;
}

function getOrganizationDataFormatted()
{
    $userOrganizationList = DB_getUserOrganizationsList();
    formatOrganizationListItemsAssetsPath($userOrganizationList);

    return $userOrganizationList;
}

function getOrganizationImagesData($request, $userId, $organizationId) {
    $requestPhotoArray = getFilesArray($request, 'photo', 3);
    $storedPhotos = [];

    if(!empty($requestPhotoArray)) {
        $storedPhotos = STORAGE_saveOrganizationAssets($userId, $organizationId, $requestPhotoArray, 'photo');
    }

    $requestCertificateArray = getFilesArray($request, 'certificate', 5);
    $newCertificates = [];

    if(!empty($requestCertificateArray)) {
        $newCertificates = STORAGE_saveOrganizationAssets($userId, $organizationId, $requestCertificateArray, 'certificate');
    }

    return array_merge(
        ...$newCertificates,
        ...$storedPhotos,
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

function getProfileOrganizationDataValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'certificate_1' => ['image', 'max:10240'],
            'certificate_2' => ['image', 'max:10240'],
            'certificate_3' => ['image', 'max:10240'],
            'certificate_4' => ['image', 'max:10240'],
            'certificate_5' => ['image', 'max:10240'],
            'email' => ['email', 'max:25', 'nullable'],
            'inn' => ['required', 'max:25'],
            'legal_address' => ['max:100'],
            'phone' => ['max:16'],
            'photo_1' => ['image', 'max:10240'],
            'photo_2' => ['image', 'max:10240'],
            'photo_3' => ['image', 'max:10240'],
            'real_address' => ['max:100'],
            'title' => ['required', 'max:50'],
        ],
        [
            'email' => 'Поле должно содержать email',
            'image' => 'Поле должно содержать картинку, размером не более 10Мб',
            'max' => 'Поле должно содержать максимум :max символов',
            'required' => 'Поле обязательно для заполнения',
            'size' => 'Поле должно содержать картинку, размером не более 10Мб',
        ]
    );
}

function STORAGE_destroyOrganizationData($userId, $organizationId) {
    try {
        File::deleteDirectory(
            storage_path() .
            '/app/public/users/' .
            $userId .
            '/organization/' .
            $organizationId
        );
    } catch(\Exception $err) {
        abort(500);
    }
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

function tryDestroyOrganizationDataInDB($organizationId)
{
    $authUser = Auth::user();
    $user_id = $authUser->id;

    STORAGE_destroyOrganizationData($user_id, $organizationId);
    DB_destroyOrganizationItem($user_id, $organizationId);

    return true;
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
        'is_approved' => false,
        'approved_error_message' => null,
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
