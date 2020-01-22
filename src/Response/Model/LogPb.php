<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * LogPb.
 *
 * @method string getImprId()
 * @method bool isImprId()
 * @method $this setImprId(string $value)
 * @method $this unsetImprId()
 */
class LogPb extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'impr_id'   => 'string',
    ];
}
