<?php
namespace MrPrompt\ImovelWeb\Tests\Imobiliarias;

use GuzzleHttp\Psr7\Response;
use MrPrompt\ImovelWeb\Imobiliarias\Anuncios;
use MrPrompt\ImovelWeb\Tests\Base\Base;

class AnunciosTest extends Base
{
    /**
     * @test
     */
    public function resumo()
    {
        $handleResponse = '{
            "number": 0,
            "size": 0,
            "total": 0,
            "content": []
        }';

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $result = $this->service->resumo('15447738');

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }

}
