<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * LoginData.
 *
 * @method mixed getArea()
 * @method mixed getAvatarUrl()
 * @method string getBgImgUrl()
 * @method mixed getBirthday()
 * @method int getCanBeFoundByPhone()
 * @method mixed getConnects()
 * @method int getCountryCode()
 * @method mixed getDescription()
 * @method int getDeviceId()
 * @method string getEmail()
 * @method int getFollowersCount()
 * @method int getFollowingsCount()
 * @method int getGender()
 * @method int getHasPassword()
 * @method mixed getIndustry()
 * @method int getIsBlocked()
 * @method int getIsBlocking()
 * @method bool getIsManualSetUserInfo()
 * @method int getIsRecommendAllowed()
 * @method int getMediaId()
 * @method mixed getMobile()
 * @method string getName()
 * @method int getNewUser()
 * @method string getRecommendHintMessage()
 * @method string getScreenName()
 * @method string getSessionKey()
 * @method int getShareToRepost()
 * @method int getSkipEditProfile()
 * @method mixed getUserAuthInfo()
 * @method mixed getUserDecoration()
 * @method string getUserId()
 * @method string getUserIdStr()
 * @method int getUserPrivacyExtend()
 * @method bool getUserVerified()
 * @method mixed getVerifiedAgency()
 * @method mixed getVerifiedContent()
 * @method int getVisitCountRecent()
 * @method bool isArea()
 * @method bool isAvatarUrl()
 * @method bool isBgImgUrl()
 * @method bool isBirthday()
 * @method bool isCanBeFoundByPhone()
 * @method bool isConnects()
 * @method bool isCountryCode()
 * @method bool isDescription()
 * @method bool isDeviceId()
 * @method bool isEmail()
 * @method bool isFollowersCount()
 * @method bool isFollowingsCount()
 * @method bool isGender()
 * @method bool isHasPassword()
 * @method bool isIndustry()
 * @method bool isIsBlocked()
 * @method bool isIsBlocking()
 * @method bool isIsManualSetUserInfo()
 * @method bool isIsRecommendAllowed()
 * @method bool isMediaId()
 * @method bool isMobile()
 * @method bool isName()
 * @method bool isNewUser()
 * @method bool isRecommendHintMessage()
 * @method bool isScreenName()
 * @method bool isSessionKey()
 * @method bool isShareToRepost()
 * @method bool isSkipEditProfile()
 * @method bool isUserAuthInfo()
 * @method bool isUserDecoration()
 * @method bool isUserId()
 * @method bool isUserIdStr()
 * @method bool isUserPrivacyExtend()
 * @method bool isUserVerified()
 * @method bool isVerifiedAgency()
 * @method bool isVerifiedContent()
 * @method bool isVisitCountRecent()
 * @method $this setArea(mixed $value)
 * @method $this setAvatarUrl(mixed $value)
 * @method $this setBgImgUrl(string $value)
 * @method $this setBirthday(mixed $value)
 * @method $this setCanBeFoundByPhone(int $value)
 * @method $this setConnects(mixed $value)
 * @method $this setCountryCode(int $value)
 * @method $this setDescription(mixed $value)
 * @method $this setDeviceId(int $value)
 * @method $this setEmail(string $value)
 * @method $this setFollowersCount(int $value)
 * @method $this setFollowingsCount(int $value)
 * @method $this setGender(int $value)
 * @method $this setHasPassword(int $value)
 * @method $this setIndustry(mixed $value)
 * @method $this setIsBlocked(int $value)
 * @method $this setIsBlocking(int $value)
 * @method $this setIsManualSetUserInfo(bool $value)
 * @method $this setIsRecommendAllowed(int $value)
 * @method $this setMediaId(int $value)
 * @method $this setMobile(mixed $value)
 * @method $this setName(string $value)
 * @method $this setNewUser(int $value)
 * @method $this setRecommendHintMessage(string $value)
 * @method $this setScreenName(string $value)
 * @method $this setSessionKey(string $value)
 * @method $this setShareToRepost(int $value)
 * @method $this setSkipEditProfile(int $value)
 * @method $this setUserAuthInfo(mixed $value)
 * @method $this setUserDecoration(mixed $value)
 * @method $this setUserId(string $value)
 * @method $this setUserIdStr(string $value)
 * @method $this setUserPrivacyExtend(int $value)
 * @method $this setUserVerified(bool $value)
 * @method $this setVerifiedAgency(mixed $value)
 * @method $this setVerifiedContent(mixed $value)
 * @method $this setVisitCountRecent(int $value)
 * @method $this unsetArea()
 * @method $this unsetAvatarUrl()
 * @method $this unsetBgImgUrl()
 * @method $this unsetBirthday()
 * @method $this unsetCanBeFoundByPhone()
 * @method $this unsetConnects()
 * @method $this unsetCountryCode()
 * @method $this unsetDescription()
 * @method $this unsetDeviceId()
 * @method $this unsetEmail()
 * @method $this unsetFollowersCount()
 * @method $this unsetFollowingsCount()
 * @method $this unsetGender()
 * @method $this unsetHasPassword()
 * @method $this unsetIndustry()
 * @method $this unsetIsBlocked()
 * @method $this unsetIsBlocking()
 * @method $this unsetIsManualSetUserInfo()
 * @method $this unsetIsRecommendAllowed()
 * @method $this unsetMediaId()
 * @method $this unsetMobile()
 * @method $this unsetName()
 * @method $this unsetNewUser()
 * @method $this unsetRecommendHintMessage()
 * @method $this unsetScreenName()
 * @method $this unsetSessionKey()
 * @method $this unsetShareToRepost()
 * @method $this unsetSkipEditProfile()
 * @method $this unsetUserAuthInfo()
 * @method $this unsetUserDecoration()
 * @method $this unsetUserId()
 * @method $this unsetUserIdStr()
 * @method $this unsetUserPrivacyExtend()
 * @method $this unsetUserVerified()
 * @method $this unsetVerifiedAgency()
 * @method $this unsetVerifiedContent()
 * @method $this unsetVisitCountRecent()
 */
class LoginData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'user_id'                   => 'string',
        'user_id_str'               => 'string',
        'name'                      => 'string',
        'screen_name'               => 'string',
        'avatar_url'                => '',
        'user_verified'             => 'bool',
        'verified_content'          => '',
        'verified_agency'           => '',
        'is_blocked'                => 'int',
        'is_blocking'               => 'int',
        'bg_img_url'                => 'string',
        'gender'                    => 'int',
        'media_id'                  => 'int',
        'user_auth_info'            => '',
        'industry'                  => '',
        'area'                      => '',
        'can_be_found_by_phone'     => 'int',
        'mobile'                    => '',
        'birthday'                  => '',
        'description'               => '',
        'email'                     => 'string',
        'new_user'                  => 'int',
        'session_key'               => 'string',
        'is_recommend_allowed'      => 'int',
        'recommend_hint_message'    => 'string',
        'connects'                  => '',
        'followings_count'          => 'int',
        'followers_count'           => 'int',
        'visit_count_recent'        => 'int',
        'skip_edit_profile'         => 'int',
        'is_manual_set_user_info'   => 'bool',
        'device_id'                 => 'int',
        'country_code'              => 'int',
        'has_password'              => 'int',
        'share_to_repost'           => 'int',
        'user_decoration'           => '',
        'user_privacy_extend'       => 'int',
    ];
}
