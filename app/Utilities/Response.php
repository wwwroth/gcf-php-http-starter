<?php

namespace App\Utilities;

class Response
{
    /**
     * @param array $response
     * @param bool $success
     * @param array|null $merge
     */
    public static function json(array $response, bool $success = true, array $merge = null)
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($success ? 200 : 400);

        $response = [
            'success' => $success,
            'data' => $response
        ];

        if ($merge) {
            $response = array_merge($merge, $response);
        }

        echo json_encode($response);
        exit;
    }

    /**
     * @param $code
     */
    public static function throw($code)
    {
        http_response_code($code);
        exit;
    }
}