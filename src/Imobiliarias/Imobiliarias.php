<?php
namespace ImovelWeb\Imobiliarias;

use GuzzleHttp\Exception\ClientException;
use ImovelWeb\Base\Base;

class Imobiliarias extends Base
{
    /**
     * Todas as imobiliárias para uma integração.
     *
     * @return mixed
     */
    public function listar()
    {
        try {
            $response = $this->client->request('GET', 'imobiliarias');

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            return [];
        }
    }

    /**
     * Desvincular uma imobiliaria de uma interface
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function desvincular(string $imobiliaria)
    {
        try {
            $response = $this->client->request('DELETE', "imobiliarias/{$imobiliaria}");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            return [];
        }
    }

    /**
     * Dados de FTP da imobiliária
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function ftp(string $imobiliaria)
    {
        try {
            $response = $this->client->request('GET', "imobiliarias/{$imobiliaria}/ftp");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            return [];
        }
    }

    /**
     * Qualidade de uma integração
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function qualidade(string $imobiliaria)
    {
        try {
            $response = $this->client->request('GET', "qualidade/{$imobiliaria}/qualidade");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            return [];
        }
    }
}
