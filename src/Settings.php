<?php

namespace TikTokAPI;

use Exception;

class Settings
{
    public $userStorage;
    public $storagePath;
    public $file = 'settings.dat';

    public function __construct(
        $storagePath = null)
    {
        if ($storagePath === null) {
            $this->storagePath = __DIR__.'/../sessions';
        } else {
            $this->storagePath = $storagePath;
        }
    }

    public function setUser(
        $username)
    {
        $this->userStorage = rtrim($this->storagePath, '/').'/'.$username;
        if (!file_exists($this->userStorage)) {
            if (!mkdir($this->userStorage, 0777, true)) {
                throw new Exception('Error with write permissions while creating user storage');
            }
        }
    }

    public function set(
        $key,
        $value)
    {
        $jsonData = null;
        if (file_exists($this->userStorage.'/'.$this->file)) {
            $jsonData = file_get_contents($this->userStorage.'/'.$this->file);
        }
        $data = (array) json_decode($jsonData, true);
        $data[$key] = $value;

        file_put_contents($this->userStorage.'/'.$this->file, json_encode($data));
    }

    public function get(
        $key)
    {
        if (file_exists($this->userStorage.'/'.$this->file)) {
            $jsonData = file_get_contents($this->userStorage.'/'.$this->file);
            $data = (array) json_decode($jsonData, true);
            if (array_key_exists($key, $data)) {
                return $data[$key];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function getUsernameStoragePath()
    {
        return $this->userStorage;
    }
}
