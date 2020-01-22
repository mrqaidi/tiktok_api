<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * User.
 *
 * @method mixed getAdCoverUrl()
 * @method Cover getAvatarLarger()
 * @method Cover getAvatarThumb()
 * @method Cover getAvatar_168x168()
 * @method Cover getAvatar_300x300()
 * @method mixed getChaList()
 * @method int getCommerceUserLevel()
 * @method mixed getCoverUrl()
 * @method mixed getCustomVerify()
 * @method mixed getEnterpriseVerifyReason()
 * @method int getFollowStatus()
 * @method mixed getFollowerStatus()
 * @method mixed getFollowersDetail()
 * @method mixed getGeofencing()
 * @method bool getHasUnreadStory()
 * @method mixed getHomepageBottomToast()
 * @method bool getIsVerified()
 * @method mixed getItemList()
 * @method mixed getNeedPoints()
 * @method mixed getNewStoryCover()
 * @method string getNickname()
 * @method mixed getPlatformSyncInfo()
 * @method mixed getRelativeUsers()
 * @method string getSecUid()
 * @method int getSecret()
 * @method mixed getTypeLabel()
 * @method string getUid()
 * @method string getUniqueId()
 * @method int getVerificationType()
 * @method mixed getWeiboVerify()
 * @method bool isAdCoverUrl()
 * @method bool isAvatarLarger()
 * @method bool isAvatarThumb()
 * @method bool isAvatar_168x168()
 * @method bool isAvatar_300x300()
 * @method bool isChaList()
 * @method bool isCommerceUserLevel()
 * @method bool isCoverUrl()
 * @method bool isCustomVerify()
 * @method bool isEnterpriseVerifyReason()
 * @method bool isFollowStatus()
 * @method bool isFollowerStatus()
 * @method bool isFollowersDetail()
 * @method bool isGeofencing()
 * @method bool isHasUnreadStory()
 * @method bool isHomepageBottomToast()
 * @method bool isIsVerified()
 * @method bool isItemList()
 * @method bool isNeedPoints()
 * @method bool isNewStoryCover()
 * @method bool isNickname()
 * @method bool isPlatformSyncInfo()
 * @method bool isRelativeUsers()
 * @method bool isSecUid()
 * @method bool isSecret()
 * @method bool isTypeLabel()
 * @method bool isUid()
 * @method bool isUniqueId()
 * @method bool isVerificationType()
 * @method bool isWeiboVerify()
 * @method $this setAdCoverUrl(mixed $value)
 * @method $this setAvatarLarger(Cover $value)
 * @method $this setAvatarThumb(Cover $value)
 * @method $this setAvatar_168x168(Cover $value)
 * @method $this setAvatar_300x300(Cover $value)
 * @method $this setChaList(mixed $value)
 * @method $this setCommerceUserLevel(int $value)
 * @method $this setCoverUrl(mixed $value)
 * @method $this setCustomVerify(mixed $value)
 * @method $this setEnterpriseVerifyReason(mixed $value)
 * @method $this setFollowStatus(int $value)
 * @method $this setFollowerStatus(mixed $value)
 * @method $this setFollowersDetail(mixed $value)
 * @method $this setGeofencing(mixed $value)
 * @method $this setHasUnreadStory(bool $value)
 * @method $this setHomepageBottomToast(mixed $value)
 * @method $this setIsVerified(bool $value)
 * @method $this setItemList(mixed $value)
 * @method $this setNeedPoints(mixed $value)
 * @method $this setNewStoryCover(mixed $value)
 * @method $this setNickname(string $value)
 * @method $this setPlatformSyncInfo(mixed $value)
 * @method $this setRelativeUsers(mixed $value)
 * @method $this setSecUid(string $value)
 * @method $this setSecret(int $value)
 * @method $this setTypeLabel(mixed $value)
 * @method $this setUid(string $value)
 * @method $this setUniqueId(string $value)
 * @method $this setVerificationType(int $value)
 * @method $this setWeiboVerify(mixed $value)
 * @method $this unsetAdCoverUrl()
 * @method $this unsetAvatarLarger()
 * @method $this unsetAvatarThumb()
 * @method $this unsetAvatar_168x168()
 * @method $this unsetAvatar_300x300()
 * @method $this unsetChaList()
 * @method $this unsetCommerceUserLevel()
 * @method $this unsetCoverUrl()
 * @method $this unsetCustomVerify()
 * @method $this unsetEnterpriseVerifyReason()
 * @method $this unsetFollowStatus()
 * @method $this unsetFollowerStatus()
 * @method $this unsetFollowersDetail()
 * @method $this unsetGeofencing()
 * @method $this unsetHasUnreadStory()
 * @method $this unsetHomepageBottomToast()
 * @method $this unsetIsVerified()
 * @method $this unsetItemList()
 * @method $this unsetNeedPoints()
 * @method $this unsetNewStoryCover()
 * @method $this unsetNickname()
 * @method $this unsetPlatformSyncInfo()
 * @method $this unsetRelativeUsers()
 * @method $this unsetSecUid()
 * @method $this unsetSecret()
 * @method $this unsetTypeLabel()
 * @method $this unsetUid()
 * @method $this unsetUniqueId()
 * @method $this unsetVerificationType()
 * @method $this unsetWeiboVerify()
 */
class User extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'has_unread_story'                => 'bool',
        'uid'                             => 'string',
        'avatar_thumb'                    => 'Cover',
        'unique_id'                       => 'string',
        'item_list'                       => '',
        'avatar_168x168'                  => 'Cover',
        'type_label'                      => '',
        'homepage_bottom_toast'           => '',
        'weibo_verify'                    => '',
        'platform_sync_info'              => '',
        'follower_status'                 => '',
        'new_story_cover'                 => '',
        'is_verified'                     => 'bool',
        'custom_verify'                   => '',
        'geofencing'                      => '',
        'avatar_300x300'                  => 'Cover',
        'avatar_larger'                   => 'Cover',
        'secret'                          => 'int',
        'cover_url'                       => '',
        'need_points'                     => '',
        'relative_users'                  => '',
        'cha_list'                        => '',
        'sec_uid'                         => 'string',
        'nickname'                        => 'string',
        'verification_type'               => 'int',
        'enterprise_verify_reason'        => '',
        'ad_cover_url'                    => '',
        'follow_status'                   => 'int',
        'followers_detail'                => '',
        'commerce_user_level'             => 'int',
    ];
}
