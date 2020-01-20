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

    public function setUser(
        $user,
        $deviceInfo)
    {
        $this->settings->setUser($user);

        if ($this->settings->get('openudid') === null ||
            $this->settings->get('iid') === null ||
            $this->settings->get('device_id') === null) {
            $this->settings->set('openudid', $deviceInfo['openudid']);
            $this->settings->set('iid', $deviceInfo['iid']);
            $this->settings->set('device_id', $deviceInfo['device_id']);
        }
    }

    public function loginWithEmail(
        $email,
        $user,
        $password,
        $deviceInfo)
    {
        $this->setUser($user, $deviceInfo);

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
        $response = $this->request('/aweme/v1/commit/follow/user/')
            ->setBase(1)
            ->addParam('item_id', $itemId)
            ->addParam('sec_user_id', $secUserId)
            ->addParam('from', '13') // needs logic yet.
            ->addParam('from_pre', '-1')
            ->addParam('type', 1)
            ->getResponse();

        return new Response\FollowResponse($response);
    }

    public function comment(
        $mediaId,
        $text)
    {
        $response = $this->request('/aweme/v1/comment/publish/')
            ->setBase(1)
            ->addPost('aweme_id', $mediaId)
            ->addPost('text', $text)
            ->addPost('is_self_see', 0)
            ->addPost('sticker_id', '')
            ->addPost('sticker_source', 0)
            ->addPost('sticker_width', 0)
            ->addPost('sticker_height', 0)
            ->addPost('channel_id', 0)
            ->addPost('city', '')
            ->getResponse();

        return new Response\CommentResponse($response);
    }

    public function search(
        $query,
        $offset = 0,
        $count = 10)
    {
        $response = $this->request('/aweme/v1/general/search/single/')
            ->setBase(1)
            ->addPost('keyword', $query)
            ->addPost('offset', $offset)
            ->addPost('count', $count)
            ->addPost('is_pull_refresh', 1)
            ->addPost('search_source', 'search_sug')
            ->addPost('hot_search', 0)
            ->addPost('latitude', '0.0')
            ->addPost('longitude', '0.0')
            ->addPost('query_correct_type', 1)
            ->getResponse();

        return new Response\SearchResponse($response);
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
