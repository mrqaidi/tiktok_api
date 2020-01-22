<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * CheckProfile.
 *
 * @method int getCount()
 * @method string getCreateTime()
 * @method User[] getUsers()
 * @method bool isCount()
 * @method bool isCreateTime()
 * @method bool isUsers()
 * @method $this setCount(int $value)
 * @method $this setCreateTime(string $value)
 * @method $this setUsers(User[] $value)
 * @method $this unsetCount()
 * @method $this unsetCreateTime()
 * @method $this unsetUsers()
 */
class CheckProfile extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'users'                 => 'User[]',
        'count'                 => 'int',
        'create_time'           => 'string',
    ];
}
