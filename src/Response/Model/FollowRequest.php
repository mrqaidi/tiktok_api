<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * FollowRequest.
 *
 * @method int getCount()
 * @method bool isCount()
 * @method $this setCount(int $value)
 * @method $this unsetCount()
 */
class FollowRequest extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'count'                => 'int',
    ];
}
