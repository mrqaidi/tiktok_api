<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * CommentData.
 *
 * @method string getAwemeId()
 * @method string getCid()
 * @method string getCreateTime()
 * @method int getDiggCount()
 * @method mixed getReplyComment()
 * @method string getReplyId()
 * @method string getReplyToReplyId()
 * @method int getStatus()
 * @method string getText()
 * @method mixed getTextExtra()
 * @method mixed getUser()
 * @method int getUserDigged()
 * @method bool isAwemeId()
 * @method bool isCid()
 * @method bool isCreateTime()
 * @method bool isDiggCount()
 * @method bool isReplyComment()
 * @method bool isReplyId()
 * @method bool isReplyToReplyId()
 * @method bool isStatus()
 * @method bool isText()
 * @method bool isTextExtra()
 * @method bool isUser()
 * @method bool isUserDigged()
 * @method $this setAwemeId(string $value)
 * @method $this setCid(string $value)
 * @method $this setCreateTime(string $value)
 * @method $this setDiggCount(int $value)
 * @method $this setReplyComment(mixed $value)
 * @method $this setReplyId(string $value)
 * @method $this setReplyToReplyId(string $value)
 * @method $this setStatus(int $value)
 * @method $this setText(string $value)
 * @method $this setTextExtra(mixed $value)
 * @method $this setUser(mixed $value)
 * @method $this setUserDigged(int $value)
 * @method $this unsetAwemeId()
 * @method $this unsetCid()
 * @method $this unsetCreateTime()
 * @method $this unsetDiggCount()
 * @method $this unsetReplyComment()
 * @method $this unsetReplyId()
 * @method $this unsetReplyToReplyId()
 * @method $this unsetStatus()
 * @method $this unsetText()
 * @method $this unsetTextExtra()
 * @method $this unsetUser()
 * @method $this unsetUserDigged()
 */
class CommentData extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'digg_count'            => 'int',
        'user'                  => '',
        'reply_id'              => 'string',
        'reply_to_reply_id'     => 'string',
        'text'                  => 'string',
        'create_time'           => 'string',
        'status'                => 'int',
        'user_digged'           => 'int',
        'reply_comment'         => '',
        'text_extra'            => '',
        'cid'                   => 'string',
        'aweme_id'              => 'string',
    ];
}
