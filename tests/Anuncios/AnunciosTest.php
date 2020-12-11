<?php
namespace ImovelWeb\Tests\Anuncios;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Anuncios\Anuncios;
use ImovelWeb\Tests\Base\Base;

final class AnunciosTest extends Base
{
    /**
     * @test
     */
    public function resumoSemParametros()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $result = $this->service->resumo('15447738');

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }

    /**
     * @test
     */
    public function resumoComParametros()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $result = $this->service->resumo('15447738', ['titulo' => 'Apartamento', 'codigoMoneda' => '840']);

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }

    /**
     * @test
     */
    public function infoAnuncio()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $result = $this->service->info('15447738', '3214568');

        $this->assertArrayHasKey('caracteristicas', $result);
        $this->assertArrayHasKey('titulo', $result);
        $this->assertArrayHasKey('publicador', $result);
        $this->assertArrayHasKey('descripcion', $result);
    }

    /**
     * @test
     */
    public function atualizarAnuncio()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(201, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $detalhes  = json_decode(trim($this->fixture(__FUNCTION__, 'Requests')), true);
        $result = $this->service->atualizar('15447738', '3214568', $detalhes);

        $this->assertArrayHasKey('errors', $result);
        $this->assertArrayHasKey('warnings', $result);
        $this->assertArrayHasKey('informacion', $result);
        $this->assertArrayHasKey('codigoInmobiliaria', $result);
    }

    /**
     * @test
     */
    public function atualizarAnuncioComCamposInvalidos()
    {
        $handleResponse = $this->fixture('atualizarAnuncio', 'Responses');
        $handlerStack = [new Response(201, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);

        $detalhes = [];
        $result = $this->service->atualizar('15447738', '3214568', $detalhes);

        $this->assertArrayHasKey('errors', $result);
        $this->assertArrayHasKey('warnings', $result);
        $this->assertArrayHasKey('informacion', $result);
        $this->assertArrayHasKey('codigoInmobiliaria', $result);
    }

    /**
     * @test
     */
    public function associarAnuncio()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(204, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->associar('15447738', '3214568', '1254563');

        $this->assertArrayHasKey('code', $result);
        $this->assertArrayHasKey('resposta', $result);
    }

    /**
     * @test
     */
    public function qualidadeAnuncio()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->qualidade('15447738', '3214568');

        $this->assertArrayHasKey('codigoAviso', $result);
        $this->assertArrayHasKey('idAvisoNavplat', $result);
        $this->assertArrayHasKey('mensajeCalidad', $result);
        $this->assertArrayHasKey('porcentajeCalidad', $result);
        $this->assertArrayHasKey('statusCalidad', $result);
        $this->assertArrayHasKey('validaciones', $result);
    }

    /**
     * @test
     */
    public function statusAnuncio()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->status('15447738', '3214568');

        $this->assertArrayHasKey('cantidadDeVisitas', $result);
        $this->assertArrayHasKey('codigoAviso', $result);
        $this->assertArrayHasKey('codigoDesarrollo', $result);
        $this->assertArrayHasKey('warnings', $result);
    }

    /**
     * @test
     */
    public function removerAnuncio()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(204, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Anuncios($this->client);
        $result = $this->service->remover('15447738', '3214568');

        $this->assertArrayHasKey('codigoAviso', $result[0]);
        $this->assertArrayHasKey('codigoAvisoPadre', $result[0]);
        $this->assertArrayHasKey('codigoInmobiliaria', $result[0]);
        $this->assertArrayHasKey('idAviso', $result[0]);
    }
}
