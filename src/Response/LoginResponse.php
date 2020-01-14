<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * LoginResponse.
 *
 * @method Model\LoginData getData()
 * @method string getMessage()
 * @method bool isData()
 * @method bool isMessage()
 * @method $this setData(Model\LoginData $value)
 * @method $this setMessage(string $value)
 * @method $this unsetData()
 * @method $this unsetMessage()
 */
class LoginResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'data'                          => 'Model\LoginData',
        'message'                       => 'string',
    ];
}
