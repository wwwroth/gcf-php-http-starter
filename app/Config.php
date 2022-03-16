<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

class Config
{
    /**
     * @param $key
     * @return string
     */
    public static function get($key) : string
    {
        $config = Yaml::parseFile(__DIR__ . '/../env.yaml');
        return $config[$key] ?? '';
    }

    public static function url($url) : string
    {
        return self::baseUrl() . ltrim($url, '/');
    }

    public static function baseUrl() : string
    {
        if (!isset($_SERVER['SERVER_PORT']) || !isset($_SERVER['HTTP_HOST'])) {
            $protocol = "http://";
            $domainName = "localhost:8080/";
        } else {
            $protocol = (!empty($_SERVER['HTTPS'])
                && $_SERVER['HTTPS'] !== 'off'
                || $_SERVER['SERVER_PORT'] == 443)
                ? "https://"
                : "http://";
            $domainName = $_SERVER['HTTP_HOST'].'/';
        }
        return $protocol . $domainName;
    }
}
