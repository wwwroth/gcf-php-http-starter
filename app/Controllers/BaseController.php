<?php

namespace App\Controllers;

use App\Config;

class BaseController
{
    /**
     * @param array $parameters
     * @return array
     */
    public static function helloWorld(array $parameters) : array
    {
        return [
            'hello' => 'world'
        ];
    }

    /**
     * @param array $parameters
     * @return array
     */
    public static function example(array $parameters) : array
    {
        return [
            'example' => 'method'
        ];
    }
}