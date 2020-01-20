<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

class CommentData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'digg_count'            => 'int',
        'user'                  => '',
        'reply_id'              => 'string',
        'reply_to_reply_id'     => 'string',
        'text'                  => 'string',
        'create_time'           => 'string',
        'status'                => 'int',
        'user_digged'           => 'int',
        'reply_comment'         => '',
        'text_extra'            => '',
        'cid'                   => 'string',
        'aweme_id'              => 'string'
    ];
}
