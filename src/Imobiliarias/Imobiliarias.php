<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use GuzzleHttp\Exception\ClientException;
use MrPrompt\ImovelWeb\Base\Base;

class Imobiliarias extends Base
{
    public function listar()
    {
        try {
            $response = $this->client->request('get', 'imobiliarias');

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {
        }
    }
}
