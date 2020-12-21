<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\Locais;
use ImovelWeb\Tests\Base\Base;

final class LocaisTest extends Base
{
    /**
     * @test
     */
    public function listarLocais()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Locais($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('localidades', $result[0]);
        $this->assertArrayHasKey('nombre', $result[0]);
        $this->assertArrayHasKey('nombreCompleto', $result[0]);
    }

    /**
     * @test
     */
    public function coordenadas()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Locais($this->client);

        $result = $this->service->coordenadas(
            $this->faker->latitude,
            $this->faker->longitude,
            $this->faker->countryCode
        );

        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('localidades', $result[0]);
        $this->assertArrayHasKey('nombre', $result[0]);
        $this->assertArrayHasKey('nombreCompleto', $result[0]);
    }

    /**
     * @test
     */
    public function subLocalidades()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Locais($this->client);

        $result = $this->service->subLocalidades($this->faker->randomNumber(4));

        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('localidades', $result);
        $this->assertArrayHasKey('nombre', $result);
        $this->assertArrayHasKey('nombreCompleto', $result);
    }
}
