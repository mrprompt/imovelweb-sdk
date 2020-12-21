<?php
namespace ImovelWeb\Tests\Inventario;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Inventario\TipoPropriedade;
use ImovelWeb\Tests\Base\Base;

final class TipoPropriedadeTest extends Base
{
    /**
     * @test
     */
    public function listarTipoDePropriedades()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new TipoPropriedade($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('categoria', $result[0]);
        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('nombre', $result[0]);
    }

    /**
     * @test
     */
    public function listarTiposDeLancamentos()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new TipoPropriedade($this->client);

        $result = $this->service->lancamentos();

        $this->assertArrayHasKey('categoria', $result[0]);
        $this->assertArrayHasKey('id', $result[0]);
    }

    /**
     * @test
     */
    public function listarCaracteristicasDeTipodeImovel()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new TipoPropriedade($this->client);

        $result = $this->service->caracteristicas($this->faker->randomNumber(4));

        $this->assertArrayHasKey('alias', $result[0]);
        $this->assertArrayHasKey('categoria', $result[0]);
        $this->assertArrayHasKey('id', $result[0]);
        $this->assertArrayHasKey('tipoDeCaracteristica', $result[0]);
    }

    /**
     * @test
     */
    public function listarSubTiposDeTipodeImovel()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new TipoPropriedade($this->client);

        $result = $this->service->subTipos($this->faker->randomNumber(4));

        $this->assertArrayHasKey('id', $result[0]);
    }
}
