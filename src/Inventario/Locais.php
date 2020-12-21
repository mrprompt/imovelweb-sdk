<?php
namespace ImovelWeb\Inventario;

use ImovelWeb\Base\Base;

final class Locais extends Base
{
    /**
     * Retorna as localidades.
     *
     * @return mixed
     */
    public function listar()
    {
        return $this->request('GET', 'locais');
    }

    /**
     * Retorna os ids dos locais correspondentes à latitude e longitude inseridos.
     *
     * ATENÇÃO: Momentaneamente disponível apenas para São Paulo.
     *
     * @param string $latitude
     * @param string $longitude
     * @param string $countryCode
     * @return mixed
     */
    public function coordenadas(string $latitude, string $longitude, string $countryCode)
    {
        return $this->request('GET', "locais/latitude-longitude/{$latitude},{$longitude}/countryCode/{$countryCode}");
    }

    /**
     * Retorna sub-localidades.
     *
     * @param int $localidade
     * @return mixed
     */
    public function subLocalidades(int $localidade)
    {
        return $this->request('GET', "locais/{$localidade}");
    }
}
