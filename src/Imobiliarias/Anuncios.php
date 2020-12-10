<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use GuzzleHttp\ClientInterface;

class Anuncios
{
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function resumo(string $imobiliaria)
    {
        $response = $this->client->request('get', "imobiliarias/{$imobiliaria}/anuncios/online/resumo");

        return json_decode($response->getBody(), true);
    }

}
