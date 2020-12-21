<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Lancamentos;
use ImovelWeb\Tests\Base\Base;

final class LancamentosTest extends Base
{
    /**
     * @test
     */
    public function listarEstagios()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Lancamentos($this->client);

        $result = $this->service->estagios();

        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('etapa', $result[0]);
    }
}
