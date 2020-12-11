<?php
namespace ImovelWeb\Tests\Imobiliarias;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Imobiliarias\Imobiliarias;
use ImovelWeb\Tests\Base\Base;

final class ImobiliariasTest extends Base
{
    /**
     * @test
     */
    public function listarImobiliarias()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }

    /**
     * @test
     */
    public function desvincularImobiliaria()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(204, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);
        $result = $this->service->desvincular('12356');

        $this->assertEmpty($result);
    }

    /**
     * @test
     */
    public function ftpImobiliaria()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);
        $result = $this->service->ftp('123456');

        $this->assertArrayHasKey('filename', $result);
        $this->assertArrayHasKey('host', $result);
        $this->assertArrayHasKey('password', $result);
        $this->assertArrayHasKey('username', $result);
    }

    /**
     * @test
     */
    public function qualidadeImobiliaria()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);
        $result = $this->service->qualidade('123456');

        $this->assertArrayHasKey('status', $result);
        $this->assertArrayHasKey('nombre', $result);
        $this->assertArrayHasKey('codigoInmobiliaria', $result);
        $this->assertArrayHasKey('idNavplat', $result);
    }
}
