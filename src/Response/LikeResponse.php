<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

class LikeResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status_code'       => 'int',
        'is_digg'           => 'int',
        'watch_status'      => 'int',
        'extra'             => 'Model\Extra',
        'log_pb'            => ''
    ];
}
