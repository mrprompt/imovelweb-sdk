<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\UnidadesMedida;
use ImovelWeb\Tests\Base\Base;

final class UnidadesMedidaTest extends Base
{
    /**
     * @test
     */
    public function listarUnidadesDeMedida()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new UnidadesMedida($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('nombre', $result[0]);
    }
}
