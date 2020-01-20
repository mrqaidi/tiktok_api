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

    public function like(
        $mediaId)
    {
        $response = $this->request('/aweme/v1/commit/item/digg/')
            ->setBase(1)
            ->addParam('aweme_id', $mediaId)
            ->addParam('type', 1)
            ->getResponse();

        return new Response\LikeResponse($response);
    }

    public function follow(
        $itemId,
        $secUserId)
    {
        $response = $this->request('/aweme/v1/commit/follow/user')
            ->setBase(1)
            ->addParam('item_id', $itemId)
            ->addParam('sec_user_id', $secUserId)
            ->addParam('from', '13') // needs logic yet.
            ->addParam('from_pre', '-1')
            ->addParam('type', 1)
            ->getResponse();

        return new Response\FollowResponse($response);
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
