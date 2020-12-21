<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Contato extends Base
{
    /**
     * Tipos de contato em ações.
     *
     * @return mixed
     */
    public function acoes()
    {
        return $this->request('GET', 'contatos/acoes');
    }
}
