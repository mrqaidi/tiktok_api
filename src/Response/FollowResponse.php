<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

class FollowResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status_code'       => 'int',
        'follow_status'     => 'int',
        'watch_status'      => 'int',
        'extra'             => 'Model\Extra',
        'log_pb'            => ''
    ];
}
