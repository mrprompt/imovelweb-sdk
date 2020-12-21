<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Moedas;
use ImovelWeb\Tests\Base\Base;

final class MoedasTest extends Base
{
    /**
     * @test
     */
    public function listarMoedas()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Moedas($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('codigoMoneda', $result[0]);
        $this->assertArrayHasKey('nombre', $result[0]);
    }
}
