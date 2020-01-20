<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * CommentResponse.
 *
 * @method Model\CommentData getComment()
 * @method Model\Extra getExtra()
 * @method mixed getLogPb()
 * @method string getMessage()
 * @method int getStatusCode()
 * @method string getStatusMsg()
 * @method bool isComment()
 * @method bool isExtra()
 * @method bool isLogPb()
 * @method bool isMessage()
 * @method bool isStatusCode()
 * @method bool isStatusMsg()
 * @method $this setComment(Model\CommentData $value)
 * @method $this setExtra(Model\Extra $value)
 * @method $this setLogPb(mixed $value)
 * @method $this setMessage(string $value)
 * @method $this setStatusCode(int $value)
 * @method $this setStatusMsg(string $value)
 * @method $this unsetComment()
 * @method $this unsetExtra()
 * @method $this unsetLogPb()
 * @method $this unsetMessage()
 * @method $this unsetStatusCode()
 * @method $this unsetStatusMsg()
 */
class CommentResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status_code'       => 'int',
        'status_msg'        => 'string',
        'comment'           => 'Model\CommentData',
        'extra'             => 'Model\Extra',
        'log_pb'            => '',
    ];
}
