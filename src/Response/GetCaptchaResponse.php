<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

class GetCaptchaResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'data'          => 'Model\CaptchaData',
        'ret'           => 'int',
        'action'        => '',
        'msg_type'      => '',
        'msg'           => '',
    ];
}
