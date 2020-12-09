<?php
namespace MrPrompt\ImovelWeb\Tests\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

trait FakeHttpClient
{
    public function getClient(array $handlerStack = [])
    {
        $mock = new MockHandler($handlerStack);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $client->baseUrl = '';

        return $client;
    }
}