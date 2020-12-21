<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Mapa;
use ImovelWeb\Tests\Base\Base;

final class MapaTest extends Base
{
    /**
     * @test
     */
    public function visibilidade()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Mapa($this->client);

        $result = $this->service->visibilidade();

        $this->assertArrayHasKey('mostrarMapa', $result[0]);
    }
}
