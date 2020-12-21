<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Operacoes extends Base
{
    /**
     * Retorna os tipos de operações.
     *
     * @return mixed
     */
    public function listar()
    {
        return $this->request('GET', 'operacoes');
    }
}
