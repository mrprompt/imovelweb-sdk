<?php
namespace MrPrompt\ImovelWeb\Tests\Imobiliarias;

use GuzzleHttp\Psr7\Response;
use MrPrompt\ImovelWeb\Imobiliarias\Imobiliarias;
use MrPrompt\ImovelWeb\Tests\Base\Base;

final class ImobiliariasTest extends Base
{
    /**
     * @test
     */
    public function listarImobiliarias()
    {
        $handleResponse = $this->responseFixture(__FUNCTION__);
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }
}
