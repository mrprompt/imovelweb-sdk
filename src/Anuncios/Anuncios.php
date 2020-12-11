<?php
namespace ImovelWeb\Anuncios;

use ImovelWeb\Base\Base;

final class Anuncios extends Base
{
    /**
     * Resumo de todos os anúncios online de uma imobiliária.
     * ATENÇÃO: Pode haver uma demora na atualização dos dados de acordo com as ultimas modificações.
     *
     * @param string $imobiliaria
     * @param array $args
     * @return mixed
     */
    public function resumo(string $imobiliaria, array $args = []): array
    {
        $uri = "imobiliarias/{$imobiliaria}/anuncios/online/resumo";
        $params = http_build_query($args);

        return $this->request('GET', "{$uri}?{$params}");
    }

    /**
     * Remover anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function remover(string $imobiliaria, string $anuncio): array
    {
        return $this->request('DELETE', "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}");
    }

    /**
     * Informações de um anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function info(string $imobiliaria, string $anuncio): array
    {
        return $this->request('GET', "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}");
    }

    /**
     * Criar ou modificar um anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @param array $detalhes
     * @return mixed
     */
    public function atualizar(string $imobiliaria, string $anuncio, array $detalhes = []): array
    {
        $uri = "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}";
        $body = ['aviso' => $detalhes];

        return $this->request('PUT', $uri, $body, __METHOD__);
    }

    /**
     * Associa o anúncio a um código do anúncio do integrador.
     *
     * @param string $imobiliaria
     * @param string $origem
     * @param string $destino
     * @return mixed
     */
    public function associar(string $imobiliaria, string $origem, string $destino): array
    {
        $uri = "imobiliarias/{$imobiliaria}/anuncios/{$origem}/{$destino}";

        return $this->request('PUT', $uri);
    }

    /**
     * Qualidade do anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function qualidade(string $imobiliaria, string $anuncio): array
    {
        $uri = "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}/qualidade";

        return $this->request('GET', $uri);
    }

    /**
     * Status do anúncio.
     *
     * @param string $imobiliaria
     * @param string $anuncio
     * @return mixed
     */
    public function status(string $imobiliaria, string $anuncio): array
    {
        $uri = "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}/status";

        return $this->request('GET', $uri);
    }
}
