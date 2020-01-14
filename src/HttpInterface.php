<?php

namespace TikTokAPI;

use Ramsey\Uuid\Uuid;

class HttpInterface
{
    public $parent;
    public $debug;
    public $TikTokAPIHeaders;

    public function __construct(
        $parent,
        $debug)
    {
        $this->curl = curl_init();
        $this->parent = $parent;
        $this->debug = $debug;
        $this->TikTokAPIHeaders = $this->getTikTokAPIHeaders();
    }

    public function buildTikTokUserAgent()
    {
        return sprintf('TikTok %s rv:%s (iPhone; iOS %s; %s) Cronet', Constants::TIKTOK_VERSION, Constants::IOS_VERSION, Constants::BUILD_VERSION, Constants::LOCALE);
    }

    public function setTikTokToken(
        $token)
    {
        $this->TikTokAPIHeaders[] = 'x-Tt-Token: '.$token;
    }

    public function getTikTokAPIHeaders()
    {
        return [
            'User-Agent: '.$this->buildTikTokUserAgent(),
            'sdk-version: 1',
            'Accept-Encoding: gzip, deflate',
            'X-Khronos: 0',
            'X-Gorgon: 0',
        ];
    }

    public function sendRequest(
        $host,
        $method,
        $endpoint,
        $params = null,
        $encoding = null)
    {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->TikTokAPIHeaders);
        if ($method === 'post') {
            curl_setopt($this->curl, CURLOPT_URL, $host.$endpoint);
            curl_setopt($this->curl, CURLOPT_POST, true);
            if ($encoding === 'json') {
                $params = json_encode($params);
                curl_setopt($this->curl, CURLOPT_HTTPHEADER, array_merge($this->TikTokAPIHeaders, ['Content-Type: application/json']));
            } elseif ($encoding === 'multipart') {
                $params = $this->buildMultiPart($params['fields'], $params['medias']);
            }
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);
        } elseif ($method === 'get') {
            curl_setopt($this->curl, CURLOPT_POST, false);
            if ($params !== null) {
                curl_setopt($this->curl, CURLOPT_URL, $host.$endpoint.'?'.http_build_query($params));
            } else {
                curl_setopt($this->curl, CURLOPT_URL, $host.$endpoint);
            }
        } elseif ($method === 'fpost') {
            if ($params != null) {
                curl_setopt($this->curl, CURLOPT_URL, $host.$endpoint.'?'.http_build_query($params));
            } else {
                curl_setopt($this->curl, CURLOPT_URL, $host.$endpoint);
            }
            curl_setopt($this->curl, CURLOPT_POST, true);
        } elseif ($method === 'delete') {
            curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }
        curl_setopt($this->curl, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($this->curl);
        curl_setopt($this->curl, CURLOPT_HEADER, 0);

        if ($this->debug === true) {
            $this->debug($method, $endpoint, $params, $response);
        }

        return json_decode($response, true);
    }

    public function buildMultiPart(
        $fields,
        $files)
    {
        $data = '';
        $eol = "\r\n";

        $delimiter = 'Boundary-'.Uuid::uuid4();
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array_merge($this->TikTokAPIHeaders, ['Content-Type: multipart/form-data; boundary='.$delimiter]));

        foreach ($fields as $name => $content) {
            $data .= '--'.$delimiter.$eol
                .'Content-Disposition: form-data; name="'.$name.'"'.$eol.$eol
                .$content.$eol;
        }

        foreach ($files as $name => $content) {
            $data .= '--'.$delimiter.$eol
                .'Content-Disposition: form-data; name="'.$fields['type'].'"; filename="'.Uuid::uuid4().'"'.$eol
                ;
            if ($fields['type'] === 'photo') {
                $data .= 'Content-Type: image/jpeg'.$eol;
            }

            $data .= $eol;
            $data .= file_get_contents($content).$eol;
        }
        $data .= '--'.$delimiter.'--'.$eol;

        return $data;
    }

    public function debug(
        $method,
        $endpoint,
        $payload,
        $response)
    {
        echo "\033[1;33;m".strtoupper($method).": \033[0m".$endpoint."\n";
        if (is_array($payload)) {
            echo "\033[1;35;mDATA: \033[0m".http_build_query($payload)."\n";
        } elseif (!is_string($payload) && $payload !== null) {
            echo "\033[1;35;mDATA: \033[0m".$payload."\n";
        } else {
            if (strlen($payload) !== 0) {
                echo "\033[1;35;mDATA: \033[0m".strlen($payload)." bytes\n";
            }
        }
        echo "\033[1;32;mRESPONSE: \033[0m".$response."\n\n";
    }
}
