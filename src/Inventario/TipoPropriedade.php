<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class TipoPropriedade extends Base
{
    /**
     * Retorna os tipos possíveis de imóveis.
     *
     * @return mixed
     */
    public function listar()
    {
        return $this->request('GET', 'tipopropriedade');
    }

    /**
     * Retorna os tipos de lançamentos.
     *
     * @return mixed
     */
    public function lancamentos()
    {
        return $this->request('GET', 'tipopropriedade/lancamentos');
    }

    /**
     * Retorna características de um tipo de imóvel.
     *
     * @param int $tipo
     * @return mixed
     */
    public function caracteristicas(int $tipo)
    {
        return $this->request('GET', "tipopropriedade/{$tipo}/caracteristicas");
    }

    /**
     * Retorna os possíveis subtipos do imóvel.
     *
     * @param int $tipo
     * @return mixed
     */
    public function subTipos(int $tipo)
    {
        return $this->request('GET', "tipopropriedade/{$tipo}/subtipos");
    }
}
