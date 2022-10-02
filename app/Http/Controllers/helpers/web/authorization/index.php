<?php

use App\Models\SmsRegistration;
use App\Models\User;
use App\Rules\StartWith;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

require_once('app/Http/Controllers/helpers/common/sms/index.php');

function DB_tryAuthUser($request) {
    $password = $request->input('password');
    $phone = $request->input('phone');

    return Auth::attempt(
        [
            'password' => $password,
            'phone' => $phone,
        ]
    );
}

function DB_tryLogoutUser($request) {
    try {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return true;
    } catch(\Exception $error) {
        return abort(500);
    }
}

function DB_trySaveUserInDB($request, $isApi = false)
{
    try {
        $phone = $request->input('phone');
        $password = $request->input('password');

        $newUser = new User([
            'password' => Hash::make($password),
            'phone' => $phone,
        ]);
        $newUser->save();

        if($isApi) {
            return $newUser;
        }

        return true;
    } catch (\Exception $error) {
        if($isApi) {
            return null;
        }

        return abort(500);
    }
}

function getLoginValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'password' => ['required', 'min:6'],
            'phone' => ['required', 'digits:11', new StartWith('7')],
        ],
        [
            'digits' => 'Номер теефона должен содержать 11 цифр',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
        ]
    );
}

function getRegistrationConfirmCodeValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'code' => ['required', 'digits:4'],
            'password' => ['required', 'max:25', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required', 'digits:11', new StartWith('7'), 'unique:users'],
        ],
        [
            'digits' => 'Поле должно содержать :digits цифр',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'same' => 'Поле должно совпадать с паролем',
            'unique' => 'Пользователь с таким телефоном уже зарегистрирован',
        ]
    );
}

function getRegistrationSendSmsValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'password' => ['required', 'max:25', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required', 'digits:11', new StartWith('7'), 'unique:users'],
        ],
        [
            'digits' => 'Номер теефона должен содержать 11 цифр',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'same' => 'Поле должно совпадать с паролем',
            'unique' => 'Пользователь с таким телефоном уже зарегистрирован',
        ]
    );
}

function registrationCheckSmsCode($request) {
    $phone = $request->input('phone');
    $codeFromRequest = $request->input('code');

    $smsData = SmsRegistration::where([
        'phone' => $phone,
    ])->get()->last();

    if($smsData === null) {
        return [
            'error' => 'Пользователь с указанным номером телефона не найден',
        ];
    }

    $isActive = $smsData['isActive'];

    if($isActive === 0) {
        return [
            'error' => 'Код недействителен',
        ];
    }

    $isCodeMatch = (int)$codeFromRequest === $smsData['code'];

    if(!$isCodeMatch) {
        return [
            'error' => 'Неверный код подтверждения',
        ];
    }

    SmsRegistration::where([
        'id' => $smsData['id'],
    ])->update([
        'isActive' => false,
    ]);

    return [
        'error' => '',
    ];
}

function registrationSendSMS($request) {
    $phone = $request->input('phone');
    $formattedPhone = '+' . $phone;
    $code = mt_rand(1111, 9999);
    $message = 'Компания, код подтверждения ' . $code;

    $response = SMS_send($formattedPhone, $message);

    if($response->failed()) {
        return [
            'error' => 'Не удалось отправить смс, попробуйте снова',
        ];
    }

    $smsData = $response->json();

    if(isset($smsData['error'])) {
        return [
            'error' => $smsData['error'],
        ];
    }

    SmsRegistration::create([
        'phone' => $phone,
        'code' => $code,
        'sms_id' => $smsData['id'],
    ]);

    return [
        'error' => '',
    ];
}
