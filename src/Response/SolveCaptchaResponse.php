<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * SolveCaptchaResponse.
 *
 * @method string getId()
 * @method string getMessage()
 * @method string getMode()
 * @method int getModifiedImgWidth()
 * @method Model\CaptchaReply[] getReply()
 * @method bool isId()
 * @method bool isMessage()
 * @method bool isMode()
 * @method bool isModifiedImgWidth()
 * @method bool isReply()
 * @method $this setId(string $value)
 * @method $this setMessage(string $value)
 * @method $this setMode(string $value)
 * @method $this setModifiedImgWidth(int $value)
 * @method $this setReply(Model\CaptchaReply[] $value)
 * @method $this unsetId()
 * @method $this unsetMessage()
 * @method $this unsetMode()
 * @method $this unsetModifiedImgWidth()
 * @method $this unsetReply()
 */
class SolveCaptchaResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'modified_img_width'        => 'int',
        'id'                        => 'string',
        'mode'                      => 'string',
        'reply'                     => 'Model\CaptchaReply[]',
    ];
}
