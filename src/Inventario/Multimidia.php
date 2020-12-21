<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Multimidia extends Base
{
    /**
     * Provedores para Tours 360.
     *
     * @return mixed
     */
    public function provedores()
    {
        return $this->request('GET', 'multimidia/provedores');
    }
}
