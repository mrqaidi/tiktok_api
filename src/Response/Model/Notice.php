<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class Notice extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'has_more'            => 'int',
        'total'               => 'int',
        'max_time'            => 'string',
        'min_time'            => 'string',
        'last_read_time'      => 'string',
        'status_code'         => 'int',
        'notice_list'         => 'NoticeList[]'
    ];
}
