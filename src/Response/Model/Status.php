<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Status.
 *
 * @method bool getIsDelete()
 * @method bool isIsDelete()
 * @method $this setIsDelete(bool $value)
 * @method $this unsetIsDelete()
 */
class Status extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'is_delete'                => 'bool',
    ];
}
