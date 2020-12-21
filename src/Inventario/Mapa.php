<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Mapa extends Base
{
    /**
     * Visibilidade de uma localização no mapa.
     *
     * @return mixed
     */
    public function visibilidade()
    {
        return $this->request('GET', 'mapa/visibilidade');
    }
}
