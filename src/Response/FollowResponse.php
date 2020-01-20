<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * FollowResponse.
 *
 * @method Model\Extra getExtra()
 * @method int getFollowStatus()
 * @method mixed getLogPb()
 * @method string getMessage()
 * @method int getStatusCode()
 * @method int getWatchStatus()
 * @method bool isExtra()
 * @method bool isFollowStatus()
 * @method bool isLogPb()
 * @method bool isMessage()
 * @method bool isStatusCode()
 * @method bool isWatchStatus()
 * @method $this setExtra(Model\Extra $value)
 * @method $this setFollowStatus(int $value)
 * @method $this setLogPb(mixed $value)
 * @method $this setMessage(string $value)
 * @method $this setStatusCode(int $value)
 * @method $this setWatchStatus(int $value)
 * @method $this unsetExtra()
 * @method $this unsetFollowStatus()
 * @method $this unsetLogPb()
 * @method $this unsetMessage()
 * @method $this unsetStatusCode()
 * @method $this unsetWatchStatus()
 */
class FollowResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status_code'       => 'int',
        'follow_status'     => 'int',
        'watch_status'      => 'int',
        'extra'             => 'Model\Extra',
        'log_pb'            => '',
    ];
}
