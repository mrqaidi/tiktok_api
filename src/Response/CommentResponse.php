<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

class CommentResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status_code'       => 'int',
        'status_msg'        => 'string',
        'comment'           => 'Model\CommentData',
        'extra'             => 'Model\Extra',
        'log_pb'            => ''
    ];
}
