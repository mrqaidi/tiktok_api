<?php

namespace TikTokAPI;

class Request
{
    protected $_parent = null;
    protected $_http = null;
    protected $_url = null;
    protected $_endpoint = null;
    protected $_base = 0;
    protected $_posts = null;
    protected $_params = null;
    protected $_headers = null;
    protected $_payload = null;
    protected $_encoding = 'json';
    protected $_skip = false;
    protected $_disableDefaultParams = false;

    public function __construct(
        $parent,
        $endpoint)
    {
        $this->_parent = $parent;
        $this->_http = new HttpInterface($this->_parent);
        $this->_endpoint = $endpoint;
        $this->addBasicHeaders();
    }

    /**
     * Add query param to request, overwriting any previous value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return self
     */
    public function addParam(
        $key,
        $value)
    {
        if ($value === true) {
            $value = 'true';
        } elseif ($value === false) {
            $value = 'false';
        }
        $this->_params[$key] = $value;

        return $this;
    }

    public function getParams()
    {
        return $this->_params;
    }

    /**
     * Add POST param to request, overwriting any previous value.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return self
     */
    public function addPost(
        $key,
        $value)
    {
        if ($value === true) {
            $value = 'true';
        } elseif ($value === false) {
            $value = 'false';
        }
        $this->_posts[$key] = $value;

        return $this;
    }

    public function getPosts()
    {
        return $this->_posts;
    }

    public function addDefaultParams()
    {
        $timestamp = round(microtime(true) * 1000);
        $this
        ->addParam('account_sdk_version', Constants::SDK_VERSION)
        ->addParam('manifest_version_code', Constants::VERSION_CODE)
        ->addParam('_rticket', $timestamp)
        ->addParam('app_language', Constants::LANGUAGE)
        ->addParam('app_type', Constants::APP_TYPE)
        ->addParam('iid', $this->_parent->settings->get('iid'))
        ->addParam('channel', Constants::CHANNEL)
        ->addParam('device_type', Constants::DEVICE)
        ->addParam('language', Constants::LANGUAGE)
        ->addParam('locale', Constants::LANGUAGE)
        ->addParam('resolution', Constants::RESOLUTION)
        ->addParam('openudid', $this->_parent->settings->get('openudid'))
        ->addParam('update_version_code', Constants::VERSION_CODE)
        ->addParam('ac2', 'wifi')
        ->addParam('sys_region', Constants::REGION)
        ->addParam('os_api', Constants::OS_API)
        ->addParam('uoo', 1)
        ->addParam('is_my_cn', 0)
        ->addParam('timezone_name', 'GMT')
        ->addParam('dpi', '560')
        ->addParam('carrier_region', Constants::REGION)
        ->addParam('ac', 'wifi')
        ->addParam('device_id', $this->_parent->settings->get('device_id'))
        ->addParam('pass-route', 1)
        ->addParam('mcc_mnc', 310260)
        ->addParam('os_version', Constants::OS_VERSION)
        ->addParam('timezone_offset', 0)
        ->addParam('version_code', Constants::BUILD_VERSION)
        ->addParam('carrier_region_v2', 310)
        ->addParam('app_name', Constants::APP_NAME)
        ->addParam('ab_version', Constants::TIKTOK_VERSION)
        ->addParam('version_name', Constants::TIKTOK_VERSION)
        ->addParam('device_brand', ucfirst(Constants::PLATFORM))
        ->addParam('ssmix', 'a')
        ->addParam('pass-region', 1)
        ->addParam('device_platform', Constants::PLATFORM)
        ->addParam('build_number', Constants::TIKTOK_VERSION)
        ->addParam('region', Constants::REGION)
        ->addParam('aid', '1233')
        ->addParam('ts', substr($timestamp, 0, -3));
    }

    public function addHeader(
        $key,
        $value)
    {
        $this->_headers[$key] = $value;

        return $this;
    }

    public function addBasicHeaders()
    {
        $this
            ->addHeader('User-Agent', Constants::USER_AGENT)
            ->addHeader('sdk-version', 1)
            ->addHeader('Accept-Encoding', 'gzip, deflate');
    }

    public function getHeaders(
        $keyValueArray = false)
    {
        if ($keyValueArray === false) {
            $headers = [];
            foreach ($this->_headers as $key => $value) {
                $headers[] = sprintf('%s: %s', $key, $value);
            }

            return $headers;
        } else {
            return $this->_headers;
        }
    }

    public function setBase(
        $index)
    {
        $this->_base = $index;

        return $this;
    }

    public function getUrl()
    {
        if ($this->_base === 100) {
            return Constants::DEVICE_REGISTRATION[array_rand(Constants::DEVICE_REGISTRATION)]. $this->_endpoint;
        } else {
            return Constants::TIKTOK_API[$this->_base].$this->_endpoint;
        }
    }

    public function setEncoding(
        $encoding)
    {
        $this->_encoding = $encoding;

        return $this;
    }

    public function skip(
        $bool = false)
    {
        $this->_skip = $bool;

        return $this;
    }

    public function getSkip()
    {
        return $this->_skip;
    }

    public function getEncoding()
    {
        return $this->_encoding;
    }

    public function setDisableDefaultParams(
        $bool)
    {
        $this->_disableDefaultParams = $bool;

        return $this;
    }

    public function getDisableDefaultParams()
    {
        return $this->_disableDefaultParams;
    }

    public function getBody()
    {
        if ($this->getEncoding() === 'json') {
            return json_encode($this->getPosts());
        } elseif ($this->getEncoding() === 'urlencode') {
            return http_build_query($this->getPosts());
        } elseif ($this->getEncoding() === 'raw') {
            return $this->_payload;
        }
    }

    public function getResponse()
    {
        if ($this->getDisableDefaultParams() === false) {
            $this->addDefaultParams();
        }

        return $this->_http->sendRequest($this);
    }
}
