<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Publicacao;
use ImovelWeb\Tests\Base\Base;

final class PublicacaoTest extends Base
{
    /**
     * @test
     */
    public function listarAreas()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Publicacao($this->client);

        $result = $this->service->areas();

        $this->assertArrayHasKey('nombre', $result[0]);
    }
}
