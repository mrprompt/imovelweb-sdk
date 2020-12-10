<?php
namespace MrPrompt\ImovelWeb\Tests\Base;

use GuzzleHttp\ClientInterface;
use MrPrompt\ImovelWeb\Base\HttpClient;

final class HttpClientTest extends Base
{
    /**
     * @test
     */
    public function constructor()
    {

        $token = $this->faker->uuid;
        $client = new HttpClient($token);

        $this->assertInstanceOf(ClientInterface::class, $client);
        $this->assertEquals(HttpClient::USER_AGENT, $client->headers['User-Agent']);
    }
}
