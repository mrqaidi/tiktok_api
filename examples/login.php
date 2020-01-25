<?php

require __DIR__.'/../vendor/autoload.php';

/////////// API  //////////
$debug = true;
$authKey = 'YOUR_AUTH_KEY';
///////////////////////////

///// USER ///////////////
$username = '';
$password = '';
$email = '';
//////////////////////////

///// DEVICE INFO ///////////////
$deviceInfo = [
        'device_id' => '',
        'openudid'  => '',
        'iid'       => '',
];
/////////////////////////////////

$tiktok = new \TikTokAPI\TikTok($debug);
$tiktok->setAuthKey($authKey);

try {
    $loginResponse = $tiktok->login($email, $username, $password, $deviceInfo);
} catch(\TikTokAPI\Exception\AuthkeyException $e) {
    echo 'Invalid or expired auth key.';
    exit();
}

if (!$loginResponse->isOk()) {
    if ($loginResponse->getData()->getErrorCode() === 1105) {
        $captchaData = $tiktok->getCaptcha($loginResponse->getData()->getErrorCode());
        $captchaSolution = $tiktok->solveCaptcha($captchaData->getData()->getId(),
                              $captchaData->getData()->getQuestion()->getUrl1(),
                              $captchaData->getData()->getQuestion()->getUrl2(),
                              $captchaData->getData()->getQuestion()->getTipY());

        sleep(3);
        $tiktok->verifyCaptcha($captchaSolution);
    } elseif ($loginResponse->getData()->getErrorCode() === 1009) {
        echo $loginResponse->getData()->getDescription();
        exit();
    }
}

$loginResponse = $tiktok->login($email, $username, $password, $deviceInfo);

if (!$loginResponse->isOk()) {
    if ($loginResponse->getData()->getErrorCode() === 1009 || $loginResponse->getData()->getErrorCode() === 7) {
        echo $loginResponse->getData()->getDescription();
        exit();
    }
}

$tiktok->getActivity();
