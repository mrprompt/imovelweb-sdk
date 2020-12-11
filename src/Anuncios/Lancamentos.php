<?php
namespace ImovelWeb\Anuncios;

use ImovelWeb\Base\Base;

final class Lancamentos extends Base
{
    /**
     * Remover Lançamento
     *
     * @param string $imobiliaria
     * @param string $lancamento
     * @return mixed
     */
    public function resumo(string $imobiliaria, string $lancamento)
    {
        $uri = "imobiliarias/{$imobiliaria}/lancamentos/{$lancamento}";

        return $this->request('DELETE', $uri);
    }

    /**
     * Informações de um lançamento.
     *
     * @param string $imobiliaria
     * @param string $lancamento
     * @return mixed
     */
    public function info(string $imobiliaria, string $lancamento)
    {
        $uri = "imobiliarias/{$imobiliaria}/lancamentos/{$lancamento}";

        return $this->request('GET', $uri);
    }

    /**
     * Criar ou modificar o lançamento.
     *
     * @param string $imobiliaria
     * @param string $lancamento
     * @param array $detalhes
     * @return mixed
     */
    public function atualizar(string $imobiliaria, string $lancamento, array $detalhes = [])
    {
        $uri = "imobiliarias/{$imobiliaria}/lancamentos/{$lancamento}";
        $body = ['anuncio' => $detalhes];

        return $this->request('PUT', $uri, $body, __METHOD__);
    }
}
