<?php

require __DIR__.'/../vendor/autoload.php';

/////////// API  //////////
$debug = true;
$authKey = 'YOUR_AUTH_KEY';
///////////////////////////

///// ACCOUNT ///////////////
$username = '';            // This can be either a username or an email.
$password = '';
//////////////////////////

///// DEVICE INFO ///////////////
// USE ONLY IF YOU WANT TO SPECIFY ONE
$deviceInfo = null;
/////////////////////////////////

$tiktok = new \TikTokAPI\TikTok($debug);
$tiktok->setAuthKey($authKey);

$loginResponse = null;
try {
    $loginResponse = $tiktok->login($username, $password, $deviceInfo);
} catch (\TikTokAPI\Exception\AuthkeyException $e) {
    echo 'Invalid or expired auth key.';
    exit();
} finally {
    if ($loginResponse !== null) {
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
            } elseif ($loginResponse->getData()->getErrorCode() === 7) {
                echo "The account is in a cooldown.\n";
                echo $loginResponse->getData()->getDescription();
                exit();
            }
        }
        $loginResponse = $tiktok->login($username, $password, $deviceInfo);

        if (!$loginResponse->isOk()) {
            if ($loginResponse->getData()->getErrorCode() === 1009 || $loginResponse->getData()->getErrorCode() === 7) {
                echo $loginResponse->getData()->getDescription();
                exit();
            }
        }
    }
}

try {
    $tiktok->getActivity();
} catch (Exception $e) {
    echo sprintf('Oops, something went wrong: %s', $e->getMessage());
}
