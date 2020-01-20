<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Extra.
 *
 * @method mixed getFatalItemIds()
 * @method string getLogid()
 * @method string getNow()
 * @method bool isFatalItemIds()
 * @method bool isLogid()
 * @method bool isNow()
 * @method $this setFatalItemIds(mixed $value)
 * @method $this setLogid(string $value)
 * @method $this setNow(string $value)
 * @method $this unsetFatalItemIds()
 * @method $this unsetLogid()
 * @method $this unsetNow()
 */
class Extra extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'now'                   => 'string',
        'fatal_item_ids'        => '',
        'logid'                 => 'string',
    ];
}
