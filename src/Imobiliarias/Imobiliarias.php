<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use GuzzleHttp\ClientInterface;

class Imobiliarias
{
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAll()
    {
        $response = $this->client->request('get', 'imobiliarias');

        return json_decode($response->getBody(), true);
    }
}
