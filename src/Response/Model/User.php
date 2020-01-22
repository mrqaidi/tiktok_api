<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * User.
 *
 * @method bool getIsDelete()
 * @method bool isIsDelete()
 * @method $this setIsDelete(bool $value)
 * @method $this unsetIsDelete()
 */
class User extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'is_delete'                => 'bool',
    ];
}
