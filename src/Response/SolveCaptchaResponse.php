<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

class SolveCaptchaResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'modified_img_width'        => 'int',
        'id'                        => 'string',
        'mode'                      => 'string',
        'reply'                     => 'Model\CaptchaReply[]',
    ];
}
