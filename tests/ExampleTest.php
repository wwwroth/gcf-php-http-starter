<?php

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    /**
     */
    public function testExample() : void
    {
        $exampleData = \App\Controllers\BaseController::helloWorld([]);

        $this->assertArrayHasKey('hello', $exampleData);
    }
}
