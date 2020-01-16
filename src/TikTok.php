<?php

namespace TikTokAPI;

use Ramsey\Uuid\Uuid;

class TikTok
{
    public $debug;
    public $storagePath;
    public $settings;

    public function __construct(
        $debug = false,
        $storagePath = null)
    {
        $this->debug = $debug;
        $this->settings = new Settings($storagePath);
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

        $response = $this->request('/passport/user/login/')
            ->setBase(1)
            ->setEncoding('urlencode')
            ->addPost('password', Signatures::xorEncrypt($password))
            ->addPost('account_sdk_source', 'app')
            ->addPost('mix_mode', 1)
            ->addPost('multi_login', 1)
            ->addPost('email', Signatures::xorEncrypt($email))
            ->getResponse();

        return new Response\LoginResponse($response);
    }

    /**
     * Create a custom API request.
     *
     * Used internally, but can also be used by end-users if they want
     * to create completely custom API queries without modifying this library.
     *
     * @param string $endpoint
     *
     * @return \InstagramAPI\Request
     */
    public function request(
        $endpoint = '')
    {
        return new Request($this, $endpoint);
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
