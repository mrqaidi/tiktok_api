<?php

namespace TikTokAPI;

use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use RuntimeException;

/**
 * Response.
 *
 * @method string getMessage()
 * @method bool isMessage()
 * @method $this setMessage(string $value)
 * @method $this unsetMessage()
 */
class Response extends AutoPropertyMapper
{
    /** @var string */
    const STATUS_OK = 'success';

    const JSON_PROPERTY_MAP = [
        /*
         * Whether the API request succeeded or not.
         *
         * Can be: "200", "400",...
         */
        'message'  => 'string',
    ];

    /** @var HttpResponseInterface */
    public $httpResponse;

    /**
     * Checks if the response was successful.
     *
     * @return bool
     */
    public function isOk()
    {
        return $this->_getProperty('message') === self::STATUS_OK;
    }

    /**
     * Gets the message.
     *
     * This function overrides the normal getter with some special processing
     * to handle unusual multi-error message values in certain responses.
     *
     * @throws RuntimeException If the message object is of an unsupported type.
     *
     * @return string|null A message string if one exists, otherwise NULL.
     */
    public function getMessage()
    {
        // Example:
        // {"meta":{"status":400},"error":{"message":"NO_POSITION","code":40001}}

        $message = $this->_getProperty('error')->getMessage();
        if ($message === null || is_string($message)) {
            // Single error string or nothing at all.
            return $message;
        } elseif (is_array($message)) {
            // Multiple errors in an "errors" subarray.
            if (count($message) === 1 && isset($message['errors']) && is_array($message['errors'])) {
                // Add "Multiple Errors" prefix if the response contains more than one.
                // But most of the time, there will only be one error in the array.
                $str = (count($message['errors']) > 1 ? 'Multiple Errors: ' : '');
                $str .= implode(' AND ', $message['errors']); // Assumes all errors are strings.
                return $str;
            } else {
                throw new RuntimeException('Unknown message object. Expected errors subarray but found something else. Please submit a ticket about needing an Tinder-API library update!');
            }
        } else {
            throw new RuntimeException('Unknown message type. Please submit a ticket about needing an Tinder-API library update!');
        }
    }

    /**
     * Gets the HTTP response.
     *
     * @return HttpResponseInterface
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    /**
     * Sets the HTTP response.
     *
     * @param HttpResponseInterface $response
     */
    public function setHttpResponse(
        HttpResponseInterface $response)
    {
        $this->httpResponse = $response;
    }

    /**
     * Checks if an HTTP response value exists.
     *
     * @return bool
     */
    public function isHttpResponse()
    {
        return $this->httpResponse !== null;
    }
}
