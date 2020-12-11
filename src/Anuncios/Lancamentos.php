<?php
namespace ImovelWeb\Anuncios;

use GuzzleHttp\Exception\ClientException;
use ImovelWeb\Base\Base;

class Lancamentos extends Base
{
    /**
     * Remover Lançamento
     *
     * @param string $imobiliaria
     * @param string $lancamento
     * @return mixed
     */
    public function resumo(string $imobiliaria, string $lancamento)
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/lancamentos/{$lancamento}";
            $response = $this->client->request('DELETE', $uri);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Informações de um lançamento.
     *
     * @param string $imobiliaria
     * @param string $lancamento
     * @return mixed
     */
    public function info(string $imobiliaria, string $lancamento)
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/lancamentos/{$lancamento}";

            $response = $this->client->request('GET', $uri);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    /**
     * Criar ou modificar o lançamento.
     *
     * @param string $imobiliaria
     * @param string $lancamento
     * @param array $detalhes
     * @return mixed
     */
    public function atualizar(string $imobiliaria, string $lancamento, array $detalhes = [])
    {
        try {
            $uri = "imobiliarias/{$imobiliaria}/lancamentos/{$lancamento}";
            $body = ['anuncio' => json_encode($detalhes)];

            $response = $this->client->request('PUT', $uri, $body);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }
}
