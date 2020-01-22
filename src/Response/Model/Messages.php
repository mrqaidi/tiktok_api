<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class Messages extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'notice'            => 'Notice',
        'live_message'      => 'LiveMessage',
        'follow_request'    => 'FollowRequest',
        'check_profile'     => 'CheckProfile'
    ];
}
