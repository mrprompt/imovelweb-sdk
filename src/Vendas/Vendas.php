<?php
namespace MrPrompt\ImovelWeb\Vendas;

use GuzzleHttp\Exception\ClientException;
use MrPrompt\ImovelWeb\Base\Base;

class Vendas extends Base
{
    /**
     * Disponíveis para um imóvel
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function disponibilidade(string $imobiliaria)
    {
        try {
            $response = $this->client->request('GET', "imobiliarias/{$imobiliaria}/disponibilidade");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            return [];
        }
    }

    /**
     * Grade da imobiliária
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function grade(string $imobiliaria)
    {
        try {
            $response = $this->client->request('GET', "imobiliarias/{$imobiliaria}/grade");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
            return [];
        }
    }
}
