<?php
namespace ImovelWeb\Tests\Anuncios;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Anuncios\Lancamentos;
use ImovelWeb\Tests\Base\Base;

final class LancamentosTest extends Base
{
    /**
     * @test
     */
    public function infoLancamentos()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Lancamentos($this->client);

        $result = $this->service->info('15447738', '3214568');

        $this->assertArrayHasKey('caracteristicas', $result);
        $this->assertArrayHasKey('descripcion', $result);
        $this->assertArrayHasKey('titulo', $result);
        $this->assertArrayHasKey('precios', $result);
    }

    /**
     * @test
     */
    public function atualizarLancamento()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(201, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Lancamentos($this->client);

        $detalhes  = json_decode(trim($this->fixture(__FUNCTION__, 'Requests')), true);
        $result = $this->service->atualizar('15447738', '3214568', $detalhes);

        $this->assertArrayHasKey('codigoAviso', $result[0]);
        $this->assertArrayHasKey('errors', $result[0]);
        $this->assertArrayHasKey('warnings', $result[0]);
        $this->assertArrayHasKey('idEmpresa', $result[0]);
    }
}
