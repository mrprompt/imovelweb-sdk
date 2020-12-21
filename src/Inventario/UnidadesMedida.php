<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class UnidadesMedida extends Base
{
    /**
     * Retorna as unidades de medida.
     *
     * @return mixed
     */
    public function listar()
    {
        return $this->request('GET', 'unidadesmedida');
    }
}
