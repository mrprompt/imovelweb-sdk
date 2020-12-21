<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Operacoes;
use ImovelWeb\Tests\Base\Base;

final class OperacoesTest extends Base
{
    /**
     * @test
     */
    public function listarOperacoes()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Operacoes($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('operacion', $result[0]);
    }
}
