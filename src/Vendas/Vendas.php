<?php
namespace ImovelWeb\Vendas;

use ImovelWeb\Base\Base;

final class Vendas extends Base
{
    /**
     * Disponíveis para um imóvel
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function disponibilidade(string $imobiliaria)
    {
        $uri = "imobiliarias/{$imobiliaria}/disponibilidade";

        return $this->request('GET', $uri);
    }

    /**
     * Grade da imobiliária
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function grade(string $imobiliaria)
    {
        $uri = "imobiliarias/{$imobiliaria}/grade";

        return $this->request('GET', $uri);
    }
}
