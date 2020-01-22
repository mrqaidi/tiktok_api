<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * NoticeList.
 *
 * @method string getCreateTime()
 * @method Digg getDigg()
 * @method string getNid()
 * @method string getNidStr()
 * @method int getType()
 * @method string getUserId()
 * @method bool isCreateTime()
 * @method bool isDigg()
 * @method bool isNid()
 * @method bool isNidStr()
 * @method bool isType()
 * @method bool isUserId()
 * @method $this setCreateTime(string $value)
 * @method $this setDigg(Digg $value)
 * @method $this setNid(string $value)
 * @method $this setNidStr(string $value)
 * @method $this setType(int $value)
 * @method $this setUserId(string $value)
 * @method $this unsetCreateTime()
 * @method $this unsetDigg()
 * @method $this unsetNid()
 * @method $this unsetNidStr()
 * @method $this unsetType()
 * @method $this unsetUserId()
 */
class NoticeList extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'create_time'               => 'string',
        'digg'                      => 'Digg',
        'user_id'                   => 'string',
        'nid_str'                   => 'string',
        'nid'                       => 'string',
        'type'                      => 'int',
    ];
}
