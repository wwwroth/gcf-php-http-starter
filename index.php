<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controllers\BaseController;
use App\Utilities\Response;
use Psr\Http\Message\ServerRequestInterface;

// Hide notices
error_reporting(E_ERROR | E_WARNING | E_PARSE);

/**
 * @param ServerRequestInterface $request
 * @return boolean
 */
function execute(ServerRequestInterface $request) : bool
{
    try {
        $parameters = $request->getQueryParams();
        $path = rtrim($request->getUri()->getPath(), '/');

        if (strlen($path) == 0) {
            $response = BaseController::helloWorld($parameters);
        } else {
            switch ($path) {
                case '/example':
                    $response = BaseController::example($parameters);
                    break;
                default:
                    Response::throw(404);
                    break;
            }
        }

    } catch (Exception $e) {
        Response::throw(500);
    }

    Response::json($response ?? []);

    return true;
}