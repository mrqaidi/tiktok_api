<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * CaptchaData.
 *
 * @method string getId()
 * @method string getMode()
 * @method CaptchaQuestion getQuestion()
 * @method bool isId()
 * @method bool isMode()
 * @method bool isQuestion()
 * @method $this setId(string $value)
 * @method $this setMode(string $value)
 * @method $this setQuestion(CaptchaQuestion $value)
 * @method $this unsetId()
 * @method $this unsetMode()
 * @method $this unsetQuestion()
 */
class CaptchaData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'id'                 => 'string',
        'mode'               => 'string',
        'question'           => 'CaptchaQuestion',
    ];
}
