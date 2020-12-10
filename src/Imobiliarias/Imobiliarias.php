<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use GuzzleHttp\Exception\ClientException;
use MrPrompt\ImovelWeb\Base\Base;

class Imobiliarias extends Base
{
    public function listar()
    {
        try {
            $response = $this->client->request('GET', 'imobiliarias');

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    public function desvincular(string $imobiliaria)
    {
        try {
            $response = $this->client->request('DELETE', "imobiliarias/{$imobiliaria}");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    public function ftp(string $imobiliaria)
    {
        try {
            $response = $this->client->request('GET', "imobiliarias/{$imobiliaria}/ftp");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }

    public function qualidade(string $imobiliaria)
    {
        try {
            $response = $this->client->request('GET', "qualidade/{$imobiliaria}/qualidade");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }
}
