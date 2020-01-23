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

$loginResponse = $tiktok->loginWithEmail($email, $username, $password, $deviceInfo);

if (!$loginResponse->isOk()) {
    if ($loginResponse->getData()->getErrorCode() === 1105) {
        $captchaData = $tiktok->getCaptcha($loginResponse->getData()->getErrorCode());
    }
}

$captchaSolution = $tiktok->solveCaptcha($captchaData->getData()->getId(),
                      $captchaData->getData()->getQuestion()->getUrl1(),
                      $captchaData->getData()->getQuestion()->getUrl2(),
                      $captchaData->getData()->getQuestion()->getTipY());

$tiktok->verifyCaptcha($captchaSolution);

$loginResponse = $tiktok->loginWithEmail($email, $username, $password, $deviceInfo);

$tiktok->getActivity();
