<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Lancamentos extends Base
{
    /**
     * Retorna as etapas de um lançamento.
     *
     * @return mixed
     */
    public function estagios()
    {
        return $this->request('GET', 'lancamentos/estagios');
    }
}
