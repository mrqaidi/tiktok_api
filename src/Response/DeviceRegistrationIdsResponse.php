<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * DeviceRegistrationIdsResponse.
 *
 * @method string getDeviceId()
 * @method string getDeviceIdStr()
 * @method string getInstallId()
 * @method string getInstallIdStr()
 * @method string getMessage()
 * @method int getNewUser()
 * @method string getOpenudid()
 * @method string getServerTime()
 * @method bool isDeviceId()
 * @method bool isDeviceIdStr()
 * @method bool isInstallId()
 * @method bool isInstallIdStr()
 * @method bool isMessage()
 * @method bool isNewUser()
 * @method bool isOpenudid()
 * @method bool isServerTime()
 * @method $this setDeviceId(string $value)
 * @method $this setDeviceIdStr(string $value)
 * @method $this setInstallId(string $value)
 * @method $this setInstallIdStr(string $value)
 * @method $this setMessage(string $value)
 * @method $this setNewUser(int $value)
 * @method $this setOpenudid(string $value)
 * @method $this setServerTime(string $value)
 * @method $this unsetDeviceId()
 * @method $this unsetDeviceIdStr()
 * @method $this unsetInstallId()
 * @method $this unsetInstallIdStr()
 * @method $this unsetMessage()
 * @method $this unsetNewUser()
 * @method $this unsetOpenudid()
 * @method $this unsetServerTime()
 */
class DeviceRegistrationIdsResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'install_id'        => 'string',
        'install_id_str'    => 'string',
        'device_id'         => 'string',
        'device_id_str'     => 'string',
        'new_user'          => 'int',
        'server_time'       => 'string',
        'openudid'          => 'string',
    ];
}
