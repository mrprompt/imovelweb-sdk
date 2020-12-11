<?php
namespace ImovelWeb\Configuracao;

use GuzzleHttp\Exception\ClientException;
use ImovelWeb\Base\Base;

final class Callbacks extends Base
{
    /**
     * Obter configuracoes Callback
     *
     * @return mixed
     */
    public function listar()
    {
        try {
            $response = $this->client->request('GET', "configuracao/callbacks");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            $xml = simplexml_load_string($clientException->getResponse()->getBody());

            return json_decode(json_encode($xml), true);
        }
    }

    /**
     * Configuracao Callback
     *
     * @param array $configuracoes
     * @return mixed
     */
    public function atualizar(array $configuracoes)
    {
        try {
            $body = ['configuracionCallback' => json_encode($configuracoes)];
            $response = $this->client->request('PUT', "configuracao/callbacks", $body);

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            $xml = simplexml_load_string($clientException->getResponse()->getBody());

            return json_decode(json_encode($xml), true);
        }
    }
}
