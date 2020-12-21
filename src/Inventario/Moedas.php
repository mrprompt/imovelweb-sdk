<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Moedas extends Base
{
    /**
     * Retorna os tipos de moedas.
     *
     * @return mixed
     */
    public function listar()
    {
        return $this->request('GET', 'moedas');
    }
}
