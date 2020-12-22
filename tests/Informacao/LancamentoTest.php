<?php
namespace ImovelWeb\Tests\Informacao;

use GuzzleHttp\Psr7\Response;
use ImovelWeb\Informacao\Lancamento;
use ImovelWeb\Tests\Base\Base;

final class LancamentoTest extends Base
{
    /**
     * @test
     */
    public function lancamentoSubCampo()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Lancamento($this->client);

        $result = $this->service->subCampo(
            $this->faker->randomNumber(4),
            $this->faker->randomNumber(4)
        );

        $this->assertArrayHasKey('descripcion', $result);
        $this->assertArrayHasKey('ejemplo', $result);
        $this->assertArrayHasKey('esObligatorio', $result);
        $this->assertArrayHasKey('especificacion', $result);
        $this->assertArrayHasKey('maximo', $result);
        $this->assertArrayHasKey('minimo', $result);
        $this->assertArrayHasKey('nombre', $result);
        $this->assertArrayHasKey('posiblesValores', $result);
        $this->assertArrayHasKey('recomendaciones', $result);
        $this->assertArrayHasKey('tipo', $result);
    }

    /**
     * @test
     */
    public function lancamentoCampo()
    {
        $handleResponse = $this->fixture(__FUNCTION__, 'Responses');
        $handlerStack = [new Response(200, [], $handleResponse)];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Lancamento($this->client);

        $result = $this->service->campo($this->faker->randomNumber(4));

        $this->assertArrayHasKey('descripcion', $result);
        $this->assertArrayHasKey('ejemplo', $result);
        $this->assertArrayHasKey('esObligatorio', $result);
        $this->assertArrayHasKey('especificacion', $result);
        $this->assertArrayHasKey('maximo', $result);
        $this->assertArrayHasKey('minimo', $result);
        $this->assertArrayHasKey('nombre', $result);
        $this->assertArrayHasKey('posiblesValores', $result);
        $this->assertArrayHasKey('recomendaciones', $result);
        $this->assertArrayHasKey('tipo', $result);
    }
}
