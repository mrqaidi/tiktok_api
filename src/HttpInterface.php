<?php

namespace TikTokAPI;

use Ramsey\Uuid\Uuid;

class HttpInterface
{
    protected $_parent;

    public function __construct(
        $parent)
    {
        $this->_parent = $parent;
    }

    protected function _getGorgonAndKronosHeaders(
        $request)
    {
        $result = $this->_parent->request()
            ->setBase(3)
            ->skip(true)
            ->setDisableDefaultParams(true)
            ->addPost('url', $request->getUrl())
            ->addPost('query', urldecode(http_build_query($request->getParams())))
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
        if (!$request->getSkip()) {
            $request->addHeader('Cookies', $this->_getCookieString());
            if ($request->getPosts() !== null) {
                $request->addHeader('X-SS-STUB', strtoupper(md5(http_build_query($request->getPosts()))));
            }
            $this->_getGorgonAndKronosHeaders($request);
            curl_setopt($ch, CURLOPT_URL, $request->getUrl().'?'.urldecode(http_build_query($request->getParams())));
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

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->_parent->settings->getUsernameStoragePath() . '/cookies.dat');
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->_parent->settings->getUsernameStoragePath() . '/cookies.dat');
        //curl_setopt($ch, CURLOPT_VERBOSE, true);
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

    protected function _getCookieString()
    {

        $lines = explode(PHP_EOL, file_get_contents($this->_parent->settings->getUsernameStoragePath() . '/cookies.dat'));

        $cookieString = '';
        foreach ($lines as $line) {

            $cookie = array();

            // detect httponly cookies and remove #HttpOnly prefix
            if (substr($line, 0, 10) == '#HttpOnly_') {
                $line = substr($line, 10);
                $cookie['httponly'] = true;
            } else {
                $cookie['httponly'] = false;
            }

            // we only care for valid cookie def lines
            if( strlen( $line ) > 0 && $line[0] != '#' && substr_count($line, "\t") == 6) {

                // get tokens in an array
                $tokens = explode("\t", $line);

                // trim the tokens
                $tokens = array_map('trim', $tokens);

                // Extract the data
                $cookie['domain'] = $tokens[0]; // The domain that created AND can read the variable.
                $cookie['flag'] = $tokens[1];   // A TRUE/FALSE value indicating if all machines within a given domain can access the variable.
                $cookie['path'] = $tokens[2];   // The path within the domain that the variable is valid for.
                $cookie['secure'] = $tokens[3]; // A TRUE/FALSE value indicating if a secure connection with the domain is needed to access the variable.

                $cookie['expiration-epoch'] = $tokens[4];  // The UNIX time that the variable will expire on.
                $cookie['name'] = urldecode($tokens[5]);   // The name of the variable.
                $cookie['value'] = urldecode($tokens[6]);  // The value of the variable.

                // Convert date to a readable format
                $cookie['expiration'] = date('Y-m-d h:i:s', $tokens[4]);

                // Record the cookie.
                $cookies[] = $cookie;
                $cookieString .= $cookie['name'].'='.$cookie['value'].'; ';
            }
        }

        return trim($cookieString, '; ');
    }

    public function debug(
        $request,
        $response)
    {
        $method = $request->getPosts() === null ? 'GET' : 'POST';
        if ($request->getParams() !== null) {
            echo "\033[1;33;m".strtoupper($method).": \033[0m".$request->getUrl().'?'.urldecode(http_build_query($request->getParams()))."\n";
        } else {
            echo "\033[1;33;m".strtoupper($method).": \033[0m".$request->getUrl()."\n";
        }

        if ($request->getPosts() !== null) {
            echo "\033[1;35;mDATA: \033[0m".$request->getBody()."\n";
        }
        echo "\033[1;32;mRESPONSE: \033[0m".$response."\n\n";
    }
}
