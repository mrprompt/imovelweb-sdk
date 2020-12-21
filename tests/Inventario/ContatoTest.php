<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Contato;
use ImovelWeb\Tests\Base\Base;

final class ContatoTest extends Base
{
    /**
     * @test
     */
    public function listarAcoes()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Contato($this->client);

        $result = $this->service->acoes();

        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('tipo', $result[0]);
    }
}
