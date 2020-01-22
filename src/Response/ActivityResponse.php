<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * ActivityResponse.
 *
 * @method Model\Extra getExtra()
 * @method Model\LogPb getLogPb()
 * @method string getMessage()
 * @method Model\Messages getMessages()
 * @method bool isExtra()
 * @method bool isLogPb()
 * @method bool isMessage()
 * @method bool isMessages()
 * @method $this setExtra(Model\Extra $value)
 * @method $this setLogPb(Model\LogPb $value)
 * @method $this setMessage(string $value)
 * @method $this setMessages(Model\Messages $value)
 * @method $this unsetExtra()
 * @method $this unsetLogPb()
 * @method $this unsetMessage()
 * @method $this unsetMessages()
 */
class ActivityResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'messages'        => 'Model\Messages',
        'extra'           => 'Model\Extra',
        'log_pb'          => 'Model\LogPb',
    ];
}
