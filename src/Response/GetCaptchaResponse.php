<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * GetCaptchaResponse.
 *
 * @method mixed getAction()
 * @method Model\CaptchaData getData()
 * @method string getMessage()
 * @method mixed getMsg()
 * @method mixed getMsgType()
 * @method int getRet()
 * @method bool isAction()
 * @method bool isData()
 * @method bool isMessage()
 * @method bool isMsg()
 * @method bool isMsgType()
 * @method bool isRet()
 * @method $this setAction(mixed $value)
 * @method $this setData(Model\CaptchaData $value)
 * @method $this setMessage(string $value)
 * @method $this setMsg(mixed $value)
 * @method $this setMsgType(mixed $value)
 * @method $this setRet(int $value)
 * @method $this unsetAction()
 * @method $this unsetData()
 * @method $this unsetMessage()
 * @method $this unsetMsg()
 * @method $this unsetMsgType()
 * @method $this unsetRet()
 */
class GetCaptchaResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'data'          => 'Model\CaptchaData',
        'ret'           => 'int',
        'action'        => '',
        'msg_type'      => '',
        'msg'           => '',
    ];
}
