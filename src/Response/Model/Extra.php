<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class Extra extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'now'                   => 'string',
        'fatal_item_ids'        => '',
        'logid'                 => 'string'
    ];
}
