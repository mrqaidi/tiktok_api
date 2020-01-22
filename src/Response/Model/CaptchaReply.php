<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * CaptchaReply.
 *
 * @method int getRelativeTime()
 * @method int getX()
 * @method int getY()
 * @method bool isRelativeTime()
 * @method bool isX()
 * @method bool isY()
 * @method $this setRelativeTime(int $value)
 * @method $this setX(int $value)
 * @method $this setY(int $value)
 * @method $this unsetRelativeTime()
 * @method $this unsetX()
 * @method $this unsetY()
 */
class CaptchaReply extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'relative_time'               => 'int',
        'x'                           => 'int',
        'y'                           => 'int',
    ];
}
