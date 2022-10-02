<?php

use Illuminate\Support\Facades\Http;

function SMS_send($phone, $message) {
    $url = 'https://smsc.ru/sys/send.php?login=Yaolegol&psw=160189&fmt=3' . '&phones=' . $phone . '&mes=' . $message;

    return Http::get($url);
}
