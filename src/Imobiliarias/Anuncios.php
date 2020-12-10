<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use GuzzleHttp\Exception\ClientException;
use MrPrompt\ImovelWeb\Base\Base;

class Anuncios extends Base
{
    /**
     * Resumo de todos os anúncios online de uma imobiliária.
     * ATENÇÃO: Pode haver uma demora na atualização dos dados de acordo com as ultimas modificações.
     *
     * @param string $imobiliaria
     * @param array $args
     * @return mixed
     */
    public function resumo(string $imobiliaria, array $args = [])
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/anuncios/online/resumo";
            $params = http_build_query($args);
            $response = $this->client->request('GET', "{$uri}?{$params}");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Remover anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function remover(string $imobiliaria, string $anuncio)
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/anuncios//{$anuncio}";

            $response = $this->client->request('DELETE', $uri);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Informações de um anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function info(string $imobiliaria, string $anuncio)
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}";

            $response = $this->client->request('GET', $uri);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Criar ou modificar um anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @param array $detalhes
     * @return mixed
     */
    public function atualizar(string $imobiliaria, string $anuncio, array $detalhes = [])
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}";
            $body = ['aviso' => json_encode($detalhes)];

            $response = $this->client->request('PUT', $uri, $body);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Associa o anúncio a um código do anúncio do integrador.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @param array $detalhes
     * @return mixed
     */
    public function associar(string $imobiliaria, string $origem, string $destino)
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/anuncios/{$origem}/{$destino}";

            $response = $this->client->request('PUT', $uri);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Qualidade do anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function qualidade(string $imobiliaria, string $anuncio)
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}/qualidade";

            $response = $this->client->request('GET', $uri);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Status do anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function status(string $imobiliaria, string $anuncio)
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}/status";

            $response = $this->client->request('GET', $uri);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }
}
