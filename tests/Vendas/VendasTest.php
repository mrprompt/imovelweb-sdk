<?php
namespace ImovelWeb\Tests\Vendas;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Vendas\Vendas;
use ImovelWeb\Tests\Base\Base;

final class VendasTest extends Base
{
    /**
     * @test
     */
    public function disponibilidade()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Vendas($this->client);
        $result = $this->service->disponibilidade('123456');

        $this->assertArrayHasKey('disponibles', $result);
        $this->assertArrayHasKey('vencimientos', $result);
    }

    /**
     * @test
     */
    public function grade()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Vendas($this->client);
        $result = $this->service->grade('123456');

        $this->assertArrayHasKey('disponibles', $result);
        $this->assertArrayHasKey('vencimientos', $result);
    }
}
