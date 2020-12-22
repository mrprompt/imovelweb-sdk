<?php
namespace ImovelWeb\Tests\Contatos;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Contatos\Imobiliarias;
use ImovelWeb\Tests\Base\Base;

final class ImobiliariasTest extends Base
{
    /**
     * @test
     */
    public function imobiliariasMensagensAnuncio()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);

        $result = $this->service->mensagensAnuncio(
            $this->faker->randomNumber(4),
            $this->faker->randomNumber(4)
        );

        $this->assertArrayHasKey('content', $result);
        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
    }

    /**
     * @test
     */
    public function imobiliariasMensagensImobiliaria()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);

        $result = $this->service->mensagensImobiliaria(
            $this->faker->randomNumber(4),
            $this->faker->randomNumber(4)
        );

        $this->assertArrayHasKey('content', $result);
        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
    }

    /**
     * @test
     */
    public function imobiliariasContatos()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);

        $result = $this->service->contatos(
            $this->faker->randomNumber(4),
            $this->faker->randomNumber(4)
        );

        $this->assertArrayHasKey('cuestionarios', $result);
        $this->assertArrayHasKey('idContacto', $result);
        $this->assertArrayHasKey('smartlead', $result);
    }
}
