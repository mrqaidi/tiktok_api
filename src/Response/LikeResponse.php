<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * LikeResponse.
 *
 * @method Model\Extra getExtra()
 * @method int getIsDigg()
 * @method mixed getLogPb()
 * @method string getMessage()
 * @method int getStatusCode()
 * @method int getWatchStatus()
 * @method bool isExtra()
 * @method bool isIsDigg()
 * @method bool isLogPb()
 * @method bool isMessage()
 * @method bool isStatusCode()
 * @method bool isWatchStatus()
 * @method $this setExtra(Model\Extra $value)
 * @method $this setIsDigg(int $value)
 * @method $this setLogPb(mixed $value)
 * @method $this setMessage(string $value)
 * @method $this setStatusCode(int $value)
 * @method $this setWatchStatus(int $value)
 * @method $this unsetExtra()
 * @method $this unsetIsDigg()
 * @method $this unsetLogPb()
 * @method $this unsetMessage()
 * @method $this unsetStatusCode()
 * @method $this unsetWatchStatus()
 */
class LikeResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status_code'       => 'int',
        'is_digg'           => 'int',
        'watch_status'      => 'int',
        'extra'             => 'Model\Extra',
        'log_pb'            => '',
    ];
}
