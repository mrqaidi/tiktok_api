<?php

namespace TikTokAPI;

use Ramsey\Uuid\Uuid;

class HttpInterface
{
    protected $_parent;
    protected $headers;

    public function __construct(
        $parent)
    {
        $this->_parent = $parent;
    }

    protected function getUserAgent()
    {
        return 'okhttp/3.10.0.1';
    }

    protected function getGorgonAndKronosHeaders(
        $request)
    {
        $result = $this->_parent->request()
            ->setBase(2)
            ->skip(true)
            ->setDisableDefaultParams(true)
            ->setEncoding('json')
            ->addPost('url', $request->getUrl())
            ->addPost('query', http_build_query($request->getParams()))
            ->addPost('headers', $request->getHeaders(true))
            ->getResponse();

        $request->addHeader('X-Gorgon', $result['X-Gorgon']);
        $request->addHeader('X-Khronos', $result['X-Khronos']);
    }

    public function setTikTokToken(
        $token)
    {
        $this->TikTokAPIHeaders[] = 'x-Tt-Token: '.$token;
    }

    public function sendRequest(
        $request,
        $skip = false)
    {
        $ch = curl_init();
        if ($request->getPosts() !== null && !$request->getSkip()) {
            $request->addHeader('Cookies', 'store-idc=maliva; store-country-code=us');
            $request->addHeader('X-SS-STUB', strtoupper(md5(http_build_query($request->getPosts()))));
            $this->getGorgonAndKronosHeaders($request);
            curl_setopt($ch, CURLOPT_URL, $request->getUrl() . '?' . urldecode(http_build_query($request->getParams())));
        } else {
            curl_setopt($ch, CURLOPT_URL, $request->getUrl());
        }

        if ($request->getPosts() !== null) {
            if ($request->getEncoding() === 'json') {
                $request->addHeader('Content-Type', 'application/json');
            } else {
                $request->addHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            }
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request->getHeaders());
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getBody());
        }

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($ch, CURLOPT_COOKIEJAR, '');
        //curl_setopt($ch, CURLOPT_COOKIEFILE, '');
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($this->_parent->debug === true) {
            $this->debug($request, $response);
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
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($this->TikTokAPIHeaders, ['Content-Type: multipart/form-data; boundary='.$delimiter]));

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
        $request,
        $response)
    {
        $method = $request->getPosts() === null ? 'GET' : 'POST';
        if ($request->getParams() !== null) {
            echo "\033[1;33;m".strtoupper($method).": \033[0m". $request->getUrl() . '?' . urldecode(http_build_query($request->getParams())) ."\n";
        } else {
            echo "\033[1;33;m".strtoupper($method).": \033[0m". $request->getUrl()."\n";
        }

        if ($request->getPosts() !== null) {
            echo "\033[1;35;mDATA: \033[0m".$request->getBody()."\n";
        }
        echo "\033[1;32;mRESPONSE: \033[0m".$response."\n\n";
    }
}
