<?php
namespace ImovelWeb\Imobiliarias;

use GuzzleHttp\Exception\ClientException;
use ImovelWeb\Base\Base;

final class Imobiliarias extends Base
{
    /**
     * Todas as imobiliárias para uma integração.
     *
     * @return mixed
     */
    public function listar()
    {
        return $this->request('GET', 'imobiliarias');
    }

    /**
     * Desvincular uma imobiliaria de uma interface
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function desvincular(string $imobiliaria)
    {
        $uri = "imobiliarias/{$imobiliaria}";

        return $this->request('DELETE', $uri);
    }

    /**
     * Dados de FTP da imobiliária
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function ftp(string $imobiliaria)
    {
        $uri = "imobiliarias/{$imobiliaria}/ftp";

        return $this->request('GET', $uri);
    }

    /**
     * Qualidade de uma integração
     *
     * @param string $imobiliaria
     * @return mixed
     */
    public function qualidade(string $imobiliaria)
    {
        $uri = "qualidade/{$imobiliaria}/qualidade";

        return $this->request('GET', $uri);
    }
}
