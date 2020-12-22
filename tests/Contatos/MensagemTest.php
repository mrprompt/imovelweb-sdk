<?php
namespace ImovelWeb\Tests\Contatos;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Contatos\Mensagem;
use ImovelWeb\Tests\Base\Base;

final class MensagemTest extends Base
{
    /**
     * @test
     */
    public function mensagemSmartLead()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Mensagem($this->client);

        $result = $this->service->smartLead($this->faker->randomNumber(4));

        $this->assertArrayHasKey('codigoMensaje', $result);
        $this->assertArrayHasKey('mensaje', $result);
        $this->assertArrayHasKey('smartlead', $result);
    }

    /**
     * @test
     */
    public function mensagemVisualizar()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Mensagem($this->client);

        $result = $this->service->visualizar($this->faker->randomNumber(4));

        $this->assertArrayHasKey('codigoAviso', $result);
        $this->assertArrayHasKey('email', $result);
        $this->assertArrayHasKey('fecha', $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('idAvisoNavplat', $result);
        $this->assertArrayHasKey('idContacto', $result);
        $this->assertArrayHasKey('idContactoAccion', $result);
        $this->assertArrayHasKey('idMensaje', $result);
        $this->assertArrayHasKey('nombre', $result);
        $this->assertArrayHasKey('telefono', $result);
        $this->assertArrayHasKey('textoMensaje', $result);
    }
}
