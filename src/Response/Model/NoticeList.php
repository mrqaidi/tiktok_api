<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class NoticeList extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'create_time'               => 'string',
        'digg'                      => 'Digg',
        'user_id'                   => 'string',
        'nid_str'                   => 'string',
        'nid'                       => 'string',
        'type'                      => 'int',
    ];
}
