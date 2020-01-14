<?php

namespace TikTokAPI;

use Ramsey\Uuid\Uuid;

class TikTok
{
    public $storagePath;
    public $settings;
    public $http;

    public function __construct(
        $debug = false,
        $storagePath = null)
    {
        $this->settings = new Settings($storagePath);
        $this->http = new HttpInterface($this, $debug);
    }

    public function loginWithEmail(
        $email,
        $password,
        $deviceInfo)
    {
        $this->settings->setUser($email);

        if ($this->settings->get('openudid') === null) {
            $this->settings->set('openudid', $deviceInfo['openudid']);
            $this->settings->set('iid', $deviceInfo['iid']);
            $this->settings->set('device_id', $deviceInfo['device_id']);
        }

        $qs = new Utils\QueryString();
        $qs->add('version_code', Constants::TIKTOK_VERSION);
        $qs->add('pass-region', 1);
        $qs->add('language', explode('_', Constants::LOCALE)[0]);
        $qs->add('app_name', 'musical_ly');
        $qs->add('vid', Uuid::uuid4());
        $qs->add('app_version', Constants::TIKTOK_VERSION);
        $qs->add('residence', explode('_', Constants::LOCALE)[1]);
        $qs->add('is_my_cn', 0);
        $qs->add('channel', 'App Store');
        $qs->add('mcc_mnc', '');
        $qs->add('device_id', $this->settings->get('device_id'));
        $qs->add('tz_offset', date('Z'));
        $qs->add('account_region', '');
        $qs->add('sys_region', explode('_', Constants::LOCALE)[1]);
        $qs->add('aid', 1233);
        $qs->add('screen_width', 750);
        $qs->add('uoo', 0);
        $qs->add('openudid', $this->settings->get('openudid'));
        $qs->add('os_api', Constants::OS_API);
        $qs->add('ac', 'WIFI');
        $qs->add('os_version', Constants::IOS_VERSION);
        $qs->add('app_language', explode('_', Constants::LOCALE)[0]);
        $qs->add('tz_name', 'Europe/Madrid');
        $qs->add('current_region', explode('_', Constants::LOCALE)[1]);
        $qs->add('device_platform', 'iphone');
        $qs->add('build_number', Constants::BUILD_VERSION);
        $qs->add('device_type', Constants::DEVICE);
        $qs->add('iid', $this->settings->get('iid'));
        $qs->add('idfa', Uuid::uuid4());
        $qs->add('email', Signatures::xorEncrypt($email));
        $qs->add('mix_mode', 1);
        $qs->add('password', Signatures::xorEncrypt($password));

        return new Response\LoginResponse($this->http->sendRequest(Constants::TIKTOK_API, 'get', '/passport/user/login/?'.$qs->build()));
    }

    public function setTikTokToken(
        $token)
    {
        $this->http->setTikTokToken($token);
    }

    public function setUser(
        $username)
    {
        $this->settings->setUser($username);
    }
}
