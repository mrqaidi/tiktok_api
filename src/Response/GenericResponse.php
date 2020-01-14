<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * GenericResponse.
 *
 * @method string getMessage()
 * @method bool isMessage()
 * @method $this setMessage(string $value)
 * @method $this unsetMessage()
 */
class GenericResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'message'    => 'string',
    ];
}
