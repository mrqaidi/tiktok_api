<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

class DeviceRegistrationIdsResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'install_id'        => 'string',
        'install_id_str'    => 'string',
        'device_id'         => 'string',
        'device_id_str'     => 'string',
        'new_user'          => 'int',
        'server_time'       => 'string',
        'openudid'          => 'string'
    ];
}
