<?php

namespace TikTokAPI\Response;

use TikTokAPI\Response;

/**
 * SearchResponse.
 *
 * @method mixed getAdInfo()
 * @method int getCursor()
 * @method Model\SearchData getData()
 * @method Model\Extra getExtra()
 * @method int getGuideSearchWords()
 * @method int getHasMore()
 * @method mixed getLogPb()
 * @method string getMessage()
 * @method int getStatusCode()
 * @method bool isAdInfo()
 * @method bool isCursor()
 * @method bool isData()
 * @method bool isExtra()
 * @method bool isGuideSearchWords()
 * @method bool isHasMore()
 * @method bool isLogPb()
 * @method bool isMessage()
 * @method bool isStatusCode()
 * @method $this setAdInfo(mixed $value)
 * @method $this setCursor(int $value)
 * @method $this setData(Model\SearchData $value)
 * @method $this setExtra(Model\Extra $value)
 * @method $this setGuideSearchWords(int $value)
 * @method $this setHasMore(int $value)
 * @method $this setLogPb(mixed $value)
 * @method $this setMessage(string $value)
 * @method $this setStatusCode(int $value)
 * @method $this unsetAdInfo()
 * @method $this unsetCursor()
 * @method $this unsetData()
 * @method $this unsetExtra()
 * @method $this unsetGuideSearchWords()
 * @method $this unsetHasMore()
 * @method $this unsetLogPb()
 * @method $this unsetMessage()
 * @method $this unsetStatusCode()
 */
class SearchResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'status_code'           => 'int',
        'data'                  => 'Model\SearchData',
        'extra'                 => 'Model\Extra',
        'log_pb'                => '',
        'cursor'                => 'int',
        'has_more'              => 'int',
        'ad_info'               => '',
        'guide_search_words'    => 'int',
    ];
}
