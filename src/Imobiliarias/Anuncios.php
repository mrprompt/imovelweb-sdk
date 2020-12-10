<?php
namespace MrPrompt\ImovelWeb\Imobiliarias;

use MrPrompt\ImovelWeb\Base\Base;

class Anuncios extends Base
{
    public function resumo(string $imobiliaria)
    {
        $response = $this->client->request('get', "imobiliarias/{$imobiliaria}/anuncios/online/resumo");

        return json_decode($response->getBody(), true);
    }
}
