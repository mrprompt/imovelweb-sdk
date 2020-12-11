<?php
namespace MrPrompt\ImovelWeb\Tests\Configuracao;

use GuzzleHttp\Psr7\Response;
use MrPrompt\ImovelWeb\Configuracao\Callbacks;
use MrPrompt\ImovelWeb\Tests\Base\Base;

final class CallbacksTest extends Base
{
    /**
     * @test
     */
    public function listarCallbacks()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);

        $this->service = new Callbacks($this->client);
        $result = $this->service->listar();

        $this->assertArrayHasKey('authorizationHeaderKey', $result);
        $this->assertArrayHasKey('authorizationHeaderValue', $result);
        $this->assertArrayHasKey('lenguajeCallbackBody', $result);
        $this->assertArrayHasKey('url', $result);
    }

    /**
     * @test
     */
    public function atualizarCallbacks()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(204, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);

        $this->service = new Callbacks($this->client);

        $configuracoes = json_decode(trim($this->fixture(__FUNCTION__, 'Requests')), true);
        $result = $this->service->atualizar($configuracoes);

        $this->assertEmpty($result);
    }
}
