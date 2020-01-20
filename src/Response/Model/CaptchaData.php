<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class CaptchaData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                 => 'string',
        'mode'               => 'string',
        'question'           => 'CaptchaQuestion'
    ];
}
