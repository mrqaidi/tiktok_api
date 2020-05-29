<?php

namespace TikTokAPI;
/**
 * TikTok's Private API.
 *
 * TERMS OF USE:
 * - This code is in no way affiliated with, authorized, maintained, sponsored
 *   or endorsed by TikTok or any of its affiliates or subsidiaries. This is
 *   an independent and unofficial API. Use at your own risk.
 * - We do NOT support or tolerate anyone who wants to use this API to send spam
 *   or commit other online crimes.
 * - You will NOT use this API for marketing or other abusive purposes (spam,
 *   botting, harassment, massive bulk messaging...).
 *
 * @author mgp25: Founder, Reversing, Project Leader (https://github.com/mgp25)
 */
class TikTok
{
    /**
     * Debug.
     *
     * @var bool
     */
    public $debug;

    /**
     * Storage path.
     *
     * @var string
     */
    public $storagePath;

    /**
     * Settings interface.
     *
     * @var \InstagramAPI\Settings
     */
    public $settings;

    /**
     * Auth key.
     *
     * @var string
     */
    public $authKey = '';

    /**
     * Proxy.
     *
     * @var string
     */
    public $proxy = null;

    /**
     * TikTok API constructor.
     *
     * @param bool  $debug         Enables debug mode.
     * @param array $storageConfig Storage config.
     */
    public function __construct(
        $debug = false,
        $storagePath = null)
    {
        $this->debug = $debug;
        $this->settings = new Settings($storagePath);
    }

    /**
     * Sets proxy.
     *
     * @param string $proxy Proxy.
     */
    public function setProxy(
        $proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * Sets the active user.
     *
     * @param string $authKey Private API service auth key.
     */
    public function setAuthKey(
        $authKey)
    {
        $this->authKey = $authKey;
    }

    /**
     * Sets the active user.
     *
     * @param string $username   Username.
     * @param array  $deviceInfo Device information: device_id, openudid and iid.
     */
    protected function _setUser(
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

    /**
     * Get device registration IDs.
     *
     * NOTE: This data is obtained from the private subscription.
     *
     * @throws \TikTokAPI\Exception\AuthkeyException
     *
     * @return \TikTokAPI\Response\DeviceRegistrationIdsResponse
     */
    public function getDeviceRegistrationIds()
    {
        $response = $this->request('/devices')
            ->skip(true)
            ->setBase(100)
            ->setDisableDefaultParams(true)
            ->addPost('authkey', $this->authKey)
            ->getResponse();

        return new Response\DeviceRegistrationIdsResponse($response);
    }

    /**
     * Get captcha.
     *
     * @param string $code Error code from login response.
     *
     * @throws Exception
     *
     * @return \TikTokAPI\Response\GetCaptchaResponse
     */
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
            ->addParam('ch', Constants::CHANNEL)
            ->addParam('os', 0)
            ->addParam('challenge_code', $code)
            ->getResponse();

        return new Response\GetCaptchaResponse($response);
    }

    /**
     * Solve captcha.
     *
     * NOTE: This uses the private API subscription to solve captchas.
     *
     * @param string $id   Captcha ID.
     * @param string $url1 Captcha URL 1.
     * @param string $url2 Captcha URL 2.
     * @param string $posY Y Position.
     *
     * @return \TikTokAPI\Response\SolveCaptchaResponse
     */
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

    /**
     * Verify captcha solution.
     *
     * @param SolveCaptchaResponse $captchaSolution Captcha solution.
     *
     * @return \TikTokAPI\Response\GetCaptchaResponse
     */
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

    /**
     * Check if email is registered.
     *
     * @param string $email Email.
     *
     * @return \TikTokAPI\Response\CheckEmailResponse
     */
    public function checkEmail(
        $email)
    {
        return $this->request('/passport/user/check_email_registered')
            ->setBase(1)
            ->setEncoding('urlencode')
            ->addPost('mix_mode', 1)
            ->addPost('email', Signatures::xorEncrypt($email))
            ->addPost('account_sdk_source', 'app')
            ->getResponse();
    }

    /**
     * Login.
     *
     * @param string $username   It can be either a username, email or phone number.
     * @param string $password   The password of the account.
     * @param array  $deviceInfo Device information: device_id, openudid and iid.
     *
     * @return \TikTokAPI\Response\LoginResponse|null
     */
    public function login(
        $username,
        $password,
        $deviceInfo = null)
    {
        $this->_setUser($username, $deviceInfo);

        if ($this->settings->get('tttoken') !== null) {
            return;
        }

        $request = $this->request('/passport/user/login/')
            ->setBase(1)
            ->setEncoding('urlencode')
            ->addPost('password', Signatures::xorEncrypt($password))
            ->addPost('account_sdk_source', 'app')
            ->addPost('mix_mode', 1)
            ->addPost('multi_login', 1);

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $response = $request->addPost('email', Signatures::xorEncrypt($username))
                                ->getResponse();
        } else {
            $response = $request->addPost('username', Signatures::xorEncrypt($username))
                                ->getResponse();
        }

        return new Response\LoginResponse($response);
    }

    /**
     * Like media.
     *
     * @param string $media   ID  Media ID. Aweme ID.
     * @param mixed  $mediaId
     *
     * @return \TikTokAPI\Response\LikeResponse
     */
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

    /**
     * Follow user.
     *
     * @param string $secUserId Sec user ID.
     * @param int    $channelId For users, channel ID is always 3.
     *
     * @return \TikTokAPI\Response\FollowResponse
     */
    public function follow(
        $secUserId,
        $channelId = 3)
    {
        $response = $this->request('/aweme/v1/commit/follow/user/')
            ->setBase(1)
            ->addParam('from', 0)
            ->addParam('from_pre', -1)
            ->addParam('type', 1)
            ->addParam('channel_id', $channelId)
            ->addParam('sec_user_id', $secUserId)
            ->getResponse();

        return $response;
    }

    /**
     * Get user profile information.
     *
     * @param string $secUserId Sec user ID.
     *
     * @return \TikTokAPI\Response\ProfileResponse
     */
    public function getUserProfile(
        $userId,
        $secUserId)
    {
        $response = $this->request('/aweme/v1/user/')
            ->setBase(1)
            ->addParam('allow_sell_data', 0)
            ->addParam('content_language', '')
            ->addParam('user_id', $userId)
            ->addParam('address_book_access', 0)
            ->addParam('sec_user_id', $secUserId)
            ->getResponse();

        return $response;
    }

    /**
     * Get self profile information.
     *
     * @return \TikTokAPI\Response\ProfileResponse
     */
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

    /**
     * Search.
     *
     * This searches by a query in 'Top' section.
     *
     * @param string $query  The query.
     * @param int    $offset Offset. User for pagination.
     * @param int    $count  Count. Number of items returned by TikTok.
     *
     * @return \TikTokAPI\Response\SearchResponse
     */
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

    /**
     * Get account activity.
     *
     * @param int $maxTime     Max time. Timestamp for filtering activity.
     * @param int $minTime     Min time. Timestamp for filtering activity.
     * @param int $count       Count. Number of items returned by TikTok.
     * @param int $noticeGroup Notice gorup.
     *
     * @return \TikTokAPI\Response\ActivityResponse
     */
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
     * @return \TikTokAPI\Request
     */
    public function request(
        $endpoint = '')
    {
        return new Request($this, $endpoint);
    }
}
