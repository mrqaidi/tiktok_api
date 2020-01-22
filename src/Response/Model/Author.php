<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Author.
 *
 * @method mixed getAdCoverUrl()
 * @method mixed getChaList()
 * @method mixed getCoverUrl()
 * @method mixed getFollowersDetail()
 * @method mixed getGeofencing()
 * @method mixed getHomepageBottomToast()
 * @method mixed getItemList()
 * @method mixed getNeedPoints()
 * @method mixed getNewStoryCover()
 * @method mixed getPlatformSyncInfo()
 * @method mixed getRelativeUsers()
 * @method mixed getTypeLabel()
 * @method string getUid()
 * @method bool isAdCoverUrl()
 * @method bool isChaList()
 * @method bool isCoverUrl()
 * @method bool isFollowersDetail()
 * @method bool isGeofencing()
 * @method bool isHomepageBottomToast()
 * @method bool isItemList()
 * @method bool isNeedPoints()
 * @method bool isNewStoryCover()
 * @method bool isPlatformSyncInfo()
 * @method bool isRelativeUsers()
 * @method bool isTypeLabel()
 * @method bool isUid()
 * @method $this setAdCoverUrl(mixed $value)
 * @method $this setChaList(mixed $value)
 * @method $this setCoverUrl(mixed $value)
 * @method $this setFollowersDetail(mixed $value)
 * @method $this setGeofencing(mixed $value)
 * @method $this setHomepageBottomToast(mixed $value)
 * @method $this setItemList(mixed $value)
 * @method $this setNeedPoints(mixed $value)
 * @method $this setNewStoryCover(mixed $value)
 * @method $this setPlatformSyncInfo(mixed $value)
 * @method $this setRelativeUsers(mixed $value)
 * @method $this setTypeLabel(mixed $value)
 * @method $this setUid(string $value)
 * @method $this unsetAdCoverUrl()
 * @method $this unsetChaList()
 * @method $this unsetCoverUrl()
 * @method $this unsetFollowersDetail()
 * @method $this unsetGeofencing()
 * @method $this unsetHomepageBottomToast()
 * @method $this unsetItemList()
 * @method $this unsetNeedPoints()
 * @method $this unsetNewStoryCover()
 * @method $this unsetPlatformSyncInfo()
 * @method $this unsetRelativeUsers()
 * @method $this unsetTypeLabel()
 * @method $this unsetUid()
 */
class Author extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'geofencing'                           => '',
        'item_list'                            => '',
        'new_story_cover'                      => '',
        'relative_users'                       => '',
        'cha_list'                             => '',
        'uid'                                  => 'string',
        'followers_detail'                     => '',
        'platform_sync_info'                   => '',
        'need_points'                          => '',
        'homepage_bottom_toast'                => '',
        'cover_url'                            => '',
        'type_label'                           => '',
        'ad_cover_url'                         => '',
    ];
}
