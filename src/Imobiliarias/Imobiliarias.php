<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use MrPrompt\ImovelWeb\Base\Base;

class Imobiliarias extends Base
{
    public function getAll()
    {
        $response = $this->client->request('get', 'imobiliarias');

        return json_decode($response->getBody(), true);
    }
}
