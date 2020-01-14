<?php

namespace TikTokAPI\Utils;

class QueryString
{
    public $parts = [];

    public function add(
        $key,
        $value)
    {
        $this->parts[] = [
            'key'   => $key,
            'value' => $value,
        ];
    }

    public function build(
        $separator = '&',
        $equals = '=')
    {
        $queryString = [];

        foreach ($this->parts as $part) {
            $queryString[] = urlencode($part['key']).$equals.urlencode($part['value']);
        }

        return implode($separator, $queryString);
    }

    public function __toString()
    {
        return $this->build();
    }
}
