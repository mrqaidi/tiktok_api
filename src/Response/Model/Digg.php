<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Digg.
 *
 * @method Aweme getAweme()
 * @method string getCid()
 * @method Comment getComment()
 * @method mixed getContent()
 * @method int getDiggType()
 * @method string getForwardId()
 * @method User[] getFromUser()
 * @method bool getHasDiggList()
 * @method int getMergeCount()
 * @method string getRealCid()
 * @method bool isAweme()
 * @method bool isCid()
 * @method bool isComment()
 * @method bool isContent()
 * @method bool isDiggType()
 * @method bool isForwardId()
 * @method bool isFromUser()
 * @method bool isHasDiggList()
 * @method bool isMergeCount()
 * @method bool isRealCid()
 * @method $this setAweme(Aweme $value)
 * @method $this setCid(string $value)
 * @method $this setComment(Comment $value)
 * @method $this setContent(mixed $value)
 * @method $this setDiggType(int $value)
 * @method $this setForwardId(string $value)
 * @method $this setFromUser(User[] $value)
 * @method $this setHasDiggList(bool $value)
 * @method $this setMergeCount(int $value)
 * @method $this setRealCid(string $value)
 * @method $this unsetAweme()
 * @method $this unsetCid()
 * @method $this unsetComment()
 * @method $this unsetContent()
 * @method $this unsetDiggType()
 * @method $this unsetForwardId()
 * @method $this unsetFromUser()
 * @method $this unsetHasDiggList()
 * @method $this unsetMergeCount()
 * @method $this unsetRealCid()
 */
class Digg extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'aweme'                     => 'Aweme',
        'from_user'                 => 'User[]',
        'digg_type'                 => 'int',
        'cid'                       => 'string',
        'real_cid'                  => 'string',
        'forward_id'                => 'string',
        'content'                   => '',
        'merge_count'               => 'int',
        'comment'                   => 'Comment',
        'has_digg_list'             => 'bool',
    ];
}
