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
        $this
        ->addParam('account_sdk_version', 380)
        ->addParam('manifest_version_code', 2021404110)
        ->addParam('_rticket', round(microtime(true)*1000))
        ->addParam('current_region', 'ES')
        ->addParam('app_language', 'en')
        ->addParam('app_type', 'normal')
        ->addParam('iid', $this->_parent->settings->get('iid'))
        ->addParam('channel', 'googleplay')
        ->addParam('device_type', 'Samsung')
        ->addParam('language', 'en')
        ->addParam('locale', 'en')
        ->addParam('resolution', '1440*2792')
        ->addParam('openudid', $this->_parent->settings->get('openudid'))
        ->addParam('update_version_code', '2021404110')
        ->addParam('ac2', 'wifi')
        ->addParam('sys_region', 'US')
        ->addParam('os_api', 26)
        ->addParam('uoo', 1)
        ->addParam('is_my_cn', 0)
        ->addParam('timezone_name', 'GMT')
        ->addParam('dpi', '560')
        ->addParam('residence', 'US')
        ->addParam('carrier_region', 'US')
        ->addParam('ac', 'wifi')
        ->addParam('device_id', $this->_parent->settings->get('device_id'))
        ->addParam('pass-route', 1)
        ->addParam('mcc_mnc', '310260')
        ->addParam('os_version', '8.0.0')
        ->addParam('timezone_offset', 0)
        ->addParam('version_code', 140411)
        ->addParam('carrier_region_v2', 310)
        ->addParam('app_name', 'musical_ly')
        ->addParam('ab_version', '14.4.11')
        ->addParam('version_name', '14.4.11')
        ->addParam('device_brand', 'Android')
        ->addParam('ssmix', 'a')
        ->addParam('pass-region', 1)
        ->addParam('device_platform', 'android')
        ->addParam('build_number', '14.4.11')
        ->addParam('region', 'US')
        ->addParam('aid', '1223')
        ->addParam('ts', time());
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
        return Constants::TIKTOK_API[$this->_base] . $this->_endpoint;
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
