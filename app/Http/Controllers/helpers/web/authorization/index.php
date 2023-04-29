<?php

use App\Models\SmsForgotPassword;
use App\Models\SmsRegistration;
use App\Models\User;
use App\Rules\StartWith;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

require_once(app_path() . '/Http/Controllers/helpers/common/sms/index.php');

function DB_tryAuthUser($phone, $password) {
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

function DB_trySaveUserDataInDB($request)
{
    try {
        $phone = $request->input('phone');
        $password = $request->input('password');

        $user = User::where([
            'phone' => $phone,
        ])->get()->last();;

        $user->password = Hash::make($password);
        $user->save();

        return true;
    } catch (\Exception $error) {
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

function forgotPasswordSendSMS($request) {
    $phone = $request->input('phone');

    $user = User::where([
        'phone' => $phone,
    ])->get()->last();

    if($user === null) {
        return [
            'error' => 'Пользователь с указанный номером телефона не зарегистрирован',
        ];
    }

    $smsData = SmsForgotPassword::where([
        'phone' => $phone,
    ])->get()->last();

    if($smsData !== null) {
        $nowTimestamp = now()->timestamp;
        $smsTimestamp = $smsData->created_at->timestamp;
        $smsTimestampWithAddTime = $smsTimestamp + 120;
        $isSmsFresh = $nowTimestamp < $smsTimestampWithAddTime;

        if($isSmsFresh) {
            return [
                'error' => 'Смс уже отправлена. Для повторной отправки пожалуйста подождите несколько минут',
            ];
        }
    }

    $formattedPhone = '+' . $phone;
    $code = mt_rand(1111, 9999);
    $message = 'Ваш код подтверждения ' . $code;

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

    SmsForgotPassword::create([
        'phone' => $phone,
        'code' => $code,
        'sms_id' => $smsData['id'],
    ]);

    return [
        'error' => '',
    ];
}

function forgotPasswordCheckSmsCode($request) {
    $phone = $request->input('phone');
    $codeFromRequest = $request->input('code');

    $smsData = SmsForgotPassword::where([
        'phone' => $phone,
    ])->get()->last();

    if($smsData === null) {
        return [
            'error' => 'Пользователь с указанным номером телефона не найден',
        ];
    }

    $nowTimestamp = now()->timestamp;
    $smsTimestamp = $smsData->created_at->timestamp;
    $smsTimestampWithAddTime = $smsTimestamp + 120;
    $isSmsFresh = $nowTimestamp < $smsTimestampWithAddTime;

    if(!$isSmsFresh) {
        return [
            'error' => 'Срок действия кода истек',
        ];
    }

    $isActive = $smsData['isActive'];

    if($isActive === 0) {
        return [
            'error' => 'Код недействителен',
        ];
    }

    $isCodeMatch = $codeFromRequest === $smsData['code'];

    if(!$isCodeMatch) {
        return [
            'error' => 'Неверный код подтверждения',
        ];
    }

    SmsForgotPassword::where([
        'id' => $smsData['id'],
    ])->update([
        'isActive' => false,
    ]);

    return [
        'error' => '',
    ];
}

function getForgotPasswordConfirmCodeValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'code' => ['required', 'digits:4'],
            'password' => ['required', 'max:25', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required', 'digits:11', new StartWith('7')],
        ],
        [
            'digits' => 'Поле должно содержать :digits цифр',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'same' => 'Поле должно совпадать с паролем',
        ]
    );
}

function getForgotPasswordSendSmsValidator($request) {
    return Validator::make(
        $request->all(),
        [
            'password' => ['required', 'max:25', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
            'phone' => ['required', 'digits:11', new StartWith('7')],
        ],
        [
            'digits' => 'Поле должно содержать :digits цифр',
            'max' => 'Поле должно содержать максимум :max символов',
            'min' => 'Поле должно содержать минимум :min символов',
            'required' => 'Поле обязательно для заполнения',
            'same' => 'Поле должно совпадать с паролем',
        ]
    );
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
            'agreement' => ['accepted'],
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

    $nowTimestamp = now()->timestamp;
    $smsTimestamp = $smsData->created_at->timestamp;
    $smsTimestampWithAddTime = $smsTimestamp + 120;
    $isSmsFresh = $nowTimestamp < $smsTimestampWithAddTime;

    if(!$isSmsFresh) {
        return [
            'error' => 'Срок действия кода истек',
        ];
    }

    $isActive = $smsData['isActive'];

    if($isActive === 0) {
        return [
            'error' => 'Код недействителен',
        ];
    }

    $isCodeMatch = $codeFromRequest === $smsData['code'];

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

    $smsData = SmsRegistration::where([
        'phone' => $phone,
    ])->get()->last();

    if($smsData !== null) {
        $nowTimestamp = now()->timestamp;
        $smsTimestamp = $smsData->created_at->timestamp;
        $smsTimestampWithAddTime = $smsTimestamp + 120;
        $isSmsFresh = $nowTimestamp < $smsTimestampWithAddTime;

        if($isSmsFresh) {
            return [
                'error' => 'Смс уже отправлена. Для повторной отправки пожалуйста подождите несколько минут',
            ];
        }
    }

    $formattedPhone = '+' . $phone;
    $code = mt_rand(1111, 9999);
    $message = 'Ваш код подтверждения ' . $code;

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
