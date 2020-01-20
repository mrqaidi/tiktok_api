<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class CaptchaQuestion extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'url1'               => 'string',
        'url2'               => 'string',
        'tip_y'              => 'int'
    ];
}
