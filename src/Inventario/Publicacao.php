<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Publicacao extends Base
{
    /**
     * Planos de publicação.
     *
     * @return mixed
     */
    public function areas()
    {
        return $this->request('GET', 'publicacao/areas');
    }
}
