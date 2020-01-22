<?php

namespace TikTokAPI;

use Ramsey\Uuid\Uuid;

class TikTok
{
    public $debug;
    public $storagePath;
    public $settings;
    public $authKey = '';

    public function __construct(
        $debug = false,
        $storagePath = null)
    {
        $this->debug = $debug;
        $this->settings = new Settings($storagePath);
    }

    public function setAuthKey(
        $authKey)
    {
        $this->authKey = $authKey;
    }

    public function setUser(
        $user,
        $deviceInfo = null)
    {
        $this->settings->setUser($user);

        if ($this->settings->get('openudid') === null || $this->settings->get('iid') === null || $this->settings->get('device_id') === null) {
            if ($deviceInfo === null) {
                $deviceInfo = $this->getDeviceRegistrationIds();
                $this->settings->set('openudid', $deviceInfo->getOpenudid());
                $this->settings->set('iid', $deviceInfo->getInstallId());
                $this->settings->set('device_id', $deviceInfo->getDeviceId());
            } else {
                $this->settings->set('openudid', $deviceInfo['openudid']);
                $this->settings->set('iid', $deviceInfo['iid']);
                $this->settings->set('device_id', $deviceInfo['device_id']);
            }
        }
    }

    public function getDeviceRegistrationIds()
    {
        $response = $this->request('/devices')
            ->skip(true)
            ->setBase(100)
            ->setDisableDefaultParams(true)
            ->getResponse();

        return new Response\DeviceRegistrationIdsResponse($response);
    }

    public function getCaptcha(
        $code)
    {
        $response = $this->request('/get')
            ->setBase(2)
            ->skip(true)
            ->setDisableDefaultParams(true)
            ->addParam('aid', 1233)
            ->addParam('lang', 'en')
            ->addParam('app_name', 'musical_ly')
            ->addParam('iid', $this->settings->get('iid'))
            ->addParam('vc', Constants::VERSION_CODE)
            ->addParam('did', $this->settings->get('device_id'))
            ->addParam('ch', $this->settings->get('googleplay'))
            ->addParam('os', 0)
            ->addParam('challenge_code', $code)
            ->getResponse();

        return new Response\GetCaptchaResponse($response);
    }

    public function solveCaptcha(
        $id,
        $url1,
        $url2,
        $posY)
    {
        $response = $this->request('/captcha')
            ->setBase(200)
            ->skip(true)
            ->setDisableDefaultParams(true)
            ->addPost('url1', $url1)
            ->addPost('url2', $url2)
            ->addPost('id', $id)
            ->addPost('tip_y', $posY)
            ->addPost('authkey', $this->authKey)
            ->getResponse();

        return new Response\SolveCaptchaResponse($response);
    }

    public function verifyCaptcha(
        $captchaSolution)
    {
        $response = $this->request('/verify')
            ->setBase(2)
            ->skip(true)
            ->setDisableDefaultParams(true)
            ->addParam('aid', 1233)
            ->addParam('lang', 'en')
            ->addParam('app_name', 'musical_ly')
            ->addParam('iid', $this->settings->get('iid'))
            ->addParam('vc', Constants::VERSION_CODE)
            ->addParam('did', $this->settings->get('device_id'))
            ->addParam('ch', 'googleplay')
            ->addParam('os', 0)
            ->addParam('challenge_code', '1105')
            ->addPost('modified_img_width', $captchaSolution->getModifiedImgWidth())
            ->addPost('id', $captchaSolution->getId())
            ->addPost('mode', 'slide')
            ->addPost('reply', $captchaSolution->getReply())
            ->getResponse();

        return new Response\GetCaptchaResponse($response);
    }

    public function loginWithEmail(
        $email,
        $user,
        $password,
        $deviceInfo = null)
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
            ->setEncoding('urlencode')
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

    public function getActivity(
        $maxTime = 0,
        $minTime = 0,
        $count = 20,
        $noticeGroup = 36)
    {
        $response = $this->request('/aweme/v1/notice/list/message/')
            ->setBase(1)
            ->addParam('max_time', $maxTime)
            ->addParam('min_time', $minTime)
            ->addParam('count', $count)
            ->addParam('notice_group', $noticeGroup)
            ->addParam('is_mark_read', 1)
            ->getResponse();

        return new Response\ActivityResponse($response);
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
}
