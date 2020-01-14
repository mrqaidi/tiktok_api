<?php

namespace TikTokAPI;

class Signatures
{
    public static function xorEncrypt(
        $data,
        $key = 5)
    {
        $xored = '';
        for ($i = 0; $i < strlen($data); ++$i) {
            $xored .= bin2hex(chr(ord($data[$i]) ^ $key));
        }

        return $xored;
    }
}
