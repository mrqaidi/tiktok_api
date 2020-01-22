<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * CaptchaQuestion.
 *
 * @method int getTipY()
 * @method string getUrl1()
 * @method string getUrl2()
 * @method bool isTipY()
 * @method bool isUrl1()
 * @method bool isUrl2()
 * @method $this setTipY(int $value)
 * @method $this setUrl1(string $value)
 * @method $this setUrl2(string $value)
 * @method $this unsetTipY()
 * @method $this unsetUrl1()
 * @method $this unsetUrl2()
 */
class CaptchaQuestion extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'url1'               => 'string',
        'url2'               => 'string',
        'tip_y'              => 'int',
    ];
}
