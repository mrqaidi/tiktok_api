<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

class ActivityResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'messages'        => 'Model\Messages',
        'extra'           => 'Model\Extra',
        'log_pb'          => 'Model\LogPb',
    ];
}
