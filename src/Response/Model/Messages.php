<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Messages.
 *
 * @method CheckProfile getCheckProfile()
 * @method FollowRequest getFollowRequest()
 * @method LiveMessage getLiveMessage()
 * @method Notice getNotice()
 * @method bool isCheckProfile()
 * @method bool isFollowRequest()
 * @method bool isLiveMessage()
 * @method bool isNotice()
 * @method $this setCheckProfile(CheckProfile $value)
 * @method $this setFollowRequest(FollowRequest $value)
 * @method $this setLiveMessage(LiveMessage $value)
 * @method $this setNotice(Notice $value)
 * @method $this unsetCheckProfile()
 * @method $this unsetFollowRequest()
 * @method $this unsetLiveMessage()
 * @method $this unsetNotice()
 */
class Messages extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'notice'            => 'Notice',
        'live_message'      => 'LiveMessage',
        'follow_request'    => 'FollowRequest',
        'check_profile'     => 'CheckProfile',
    ];
}
