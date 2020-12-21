<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Multimidia;
use ImovelWeb\Tests\Base\Base;

final class MultimidiaTest extends Base
{
    /**
     * @test
     */
    public function listarProvedores()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Multimidia($this->client);

        $result = $this->service->provedores();

        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('nombre', $result[0]);
        $this->assertArrayHasKey('url', $result[0]);
    }
}
