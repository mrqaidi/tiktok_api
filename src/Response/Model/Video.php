<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Video.
 *
 * @method mixed getBitRate()
 * @method Cover getCover()
 * @method Cover getOriginCover()
 * @method bool isBitRate()
 * @method bool isCover()
 * @method bool isOriginCover()
 * @method $this setBitRate(mixed $value)
 * @method $this setCover(Cover $value)
 * @method $this setOriginCover(Cover $value)
 * @method $this unsetBitRate()
 * @method $this unsetCover()
 * @method $this unsetOriginCover()
 */
class Video extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'cover'                        => 'Cover',
        'origin_cover'                 => 'Cover',
        'bit_rate'                     => '',
    ];
}
