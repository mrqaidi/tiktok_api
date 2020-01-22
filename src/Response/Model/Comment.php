<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Comment.
 *
 * @method string getCid()
 * @method int getDiggCount()
 * @method mixed getReplyComment()
 * @method string getText()
 * @method mixed getTextExtra()
 * @method User getUser()
 * @method bool isCid()
 * @method bool isDiggCount()
 * @method bool isReplyComment()
 * @method bool isText()
 * @method bool isTextExtra()
 * @method bool isUser()
 * @method $this setCid(string $value)
 * @method $this setDiggCount(int $value)
 * @method $this setReplyComment(mixed $value)
 * @method $this setText(string $value)
 * @method $this setTextExtra(mixed $value)
 * @method $this setUser(User $value)
 * @method $this unsetCid()
 * @method $this unsetDiggCount()
 * @method $this unsetReplyComment()
 * @method $this unsetText()
 * @method $this unsetTextExtra()
 * @method $this unsetUser()
 */
class Comment extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'text_extra'    => '',
        'cid'           => 'string',
        'text'          => 'string',
        'digg_count'    => 'int',
        'user'          => 'User',
        'reply_comment' => '',
    ];
}
