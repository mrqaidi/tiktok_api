<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * LiveMessage.
 *
 * @method mixed getLives()
 * @method bool isLives()
 * @method $this setLives(mixed $value)
 * @method $this unsetLives()
 */
class LiveMessage extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'lives'                => '',
    ];
}
