<?php

namespace TikTokAPI\Response\Model;

use TikTokAPI\AutoPropertyMapper;

/**
 * Aweme.
 *
 * @method Author getAuthor()
 * @method string getAwemeId()
 * @method int getAwemeType()
 * @method mixed getChaList()
 * @method mixed getChallengePosition()
 * @method mixed getCommentList()
 * @method mixed getCommerceConfigData()
 * @method mixed getGeofencing()
 * @method mixed getImageInfos()
 * @method mixed getInteractionStickers()
 * @method mixed getLabelTopText()
 * @method mixed getLongVideo()
 * @method mixed getNicknamePosition()
 * @method mixed getOriginCommentIds()
 * @method mixed getPosition()
 * @method mixed getPromotions()
 * @method Status getStatus()
 * @method mixed getTextExtra()
 * @method mixed getUniqidPosition()
 * @method Video getVideo()
 * @method mixed getVideoLabels()
 * @method mixed getVideoText()
 * @method bool isAuthor()
 * @method bool isAwemeId()
 * @method bool isAwemeType()
 * @method bool isChaList()
 * @method bool isChallengePosition()
 * @method bool isCommentList()
 * @method bool isCommerceConfigData()
 * @method bool isGeofencing()
 * @method bool isImageInfos()
 * @method bool isInteractionStickers()
 * @method bool isLabelTopText()
 * @method bool isLongVideo()
 * @method bool isNicknamePosition()
 * @method bool isOriginCommentIds()
 * @method bool isPosition()
 * @method bool isPromotions()
 * @method bool isStatus()
 * @method bool isTextExtra()
 * @method bool isUniqidPosition()
 * @method bool isVideo()
 * @method bool isVideoLabels()
 * @method bool isVideoText()
 * @method $this setAuthor(Author $value)
 * @method $this setAwemeId(string $value)
 * @method $this setAwemeType(int $value)
 * @method $this setChaList(mixed $value)
 * @method $this setChallengePosition(mixed $value)
 * @method $this setCommentList(mixed $value)
 * @method $this setCommerceConfigData(mixed $value)
 * @method $this setGeofencing(mixed $value)
 * @method $this setImageInfos(mixed $value)
 * @method $this setInteractionStickers(mixed $value)
 * @method $this setLabelTopText(mixed $value)
 * @method $this setLongVideo(mixed $value)
 * @method $this setNicknamePosition(mixed $value)
 * @method $this setOriginCommentIds(mixed $value)
 * @method $this setPosition(mixed $value)
 * @method $this setPromotions(mixed $value)
 * @method $this setStatus(Status $value)
 * @method $this setTextExtra(mixed $value)
 * @method $this setUniqidPosition(mixed $value)
 * @method $this setVideo(Video $value)
 * @method $this setVideoLabels(mixed $value)
 * @method $this setVideoText(mixed $value)
 * @method $this unsetAuthor()
 * @method $this unsetAwemeId()
 * @method $this unsetAwemeType()
 * @method $this unsetChaList()
 * @method $this unsetChallengePosition()
 * @method $this unsetCommentList()
 * @method $this unsetCommerceConfigData()
 * @method $this unsetGeofencing()
 * @method $this unsetImageInfos()
 * @method $this unsetInteractionStickers()
 * @method $this unsetLabelTopText()
 * @method $this unsetLongVideo()
 * @method $this unsetNicknamePosition()
 * @method $this unsetOriginCommentIds()
 * @method $this unsetPosition()
 * @method $this unsetPromotions()
 * @method $this unsetStatus()
 * @method $this unsetTextExtra()
 * @method $this unsetUniqidPosition()
 * @method $this unsetVideo()
 * @method $this unsetVideoLabels()
 * @method $this unsetVideoText()
 */
class Aweme extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'video_text'                         => '',
        'origin_comment_ids'                 => '',
        'text_extra'                         => '',
        'position'                           => '',
        'uniqid_position'                    => '',
        'geofencing'                         => '',
        'label_top_text'                     => '',
        'commerce_config_data'               => '',
        'author'                             => 'Author',
        'video'                              => 'Video',
        'comment_list'                       => '',
        'long_video'                         => '',
        'status'                             => 'Status',
        'nickname_position'                  => '',
        'challenge_position'                 => '',
        'aweme_type'                         => 'int',
        'image_infos'                        => '',
        'promotions'                         => '',
        'interaction_stickers'               => '',
        'aweme_id'                           => 'string',
        'cha_list'                           => '',
        'video_labels'                       => '',
    ];
}
