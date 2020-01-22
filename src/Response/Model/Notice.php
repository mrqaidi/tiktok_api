<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Notice.
 *
 * @method int getHasMore()
 * @method string getLastReadTime()
 * @method string getMaxTime()
 * @method string getMinTime()
 * @method NoticeList[] getNoticeList()
 * @method int getStatusCode()
 * @method int getTotal()
 * @method bool isHasMore()
 * @method bool isLastReadTime()
 * @method bool isMaxTime()
 * @method bool isMinTime()
 * @method bool isNoticeList()
 * @method bool isStatusCode()
 * @method bool isTotal()
 * @method $this setHasMore(int $value)
 * @method $this setLastReadTime(string $value)
 * @method $this setMaxTime(string $value)
 * @method $this setMinTime(string $value)
 * @method $this setNoticeList(NoticeList[] $value)
 * @method $this setStatusCode(int $value)
 * @method $this setTotal(int $value)
 * @method $this unsetHasMore()
 * @method $this unsetLastReadTime()
 * @method $this unsetMaxTime()
 * @method $this unsetMinTime()
 * @method $this unsetNoticeList()
 * @method $this unsetStatusCode()
 * @method $this unsetTotal()
 */
class Notice extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'has_more'            => 'int',
        'total'               => 'int',
        'max_time'            => 'string',
        'min_time'            => 'string',
        'last_read_time'      => 'string',
        'status_code'         => 'int',
        'notice_list'         => 'NoticeList[]',
    ];
}
