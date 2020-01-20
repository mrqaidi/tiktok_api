<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * SearchData.
 *
 * @method mixed getAwemeInfo()
 * @method int getHasTopUser()
 * @method mixed getMusicList()
 * @method int getType()
 * @method UserList[] getUserList()
 * @method bool getViewMore()
 * @method bool isAwemeInfo()
 * @method bool isHasTopUser()
 * @method bool isMusicList()
 * @method bool isType()
 * @method bool isUserList()
 * @method bool isViewMore()
 * @method $this setAwemeInfo(mixed $value)
 * @method $this setHasTopUser(int $value)
 * @method $this setMusicList(mixed $value)
 * @method $this setType(int $value)
 * @method $this setUserList(UserList[] $value)
 * @method $this setViewMore(bool $value)
 * @method $this unsetAwemeInfo()
 * @method $this unsetHasTopUser()
 * @method $this unsetMusicList()
 * @method $this unsetType()
 * @method $this unsetUserList()
 * @method $this unsetViewMore()
 */
class SearchData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'type'              => 'int',
        'user_list'         => 'UserList[]',
        'music_list'        => '', //TODO
        'aweme_info'        => '', //TODO
        'has_top_user'      => 'int',
        'view_more'         => 'bool',
    ];
}
