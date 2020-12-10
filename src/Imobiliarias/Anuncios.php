<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use GuzzleHttp\Exception\ClientException;
use MrPrompt\ImovelWeb\Base\Base;

class Anuncios extends Base
{
    public function resumo(string $imobiliaria)
    {
        try {
            $response = $this->client->request('get', "imobiliarias/{$imobiliaria}/anuncios/online/resumo");

            return json_decode($response->getBody(), true);
        } catch (ClientException $clientException) {

        }
    }
}
