<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class CaptchaReply extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'relative_time'               => 'int',
        'x'                           => 'int',
        'y'                           => 'int'
    ];
}
