<?php
namespace ImovelWeb\Contatos;

use ImovelWeb\Base\Base;

final class Imobiliarias extends Base
{
    /**
     * Todas as mensagens para um anúncio.
     *
     * @param int $imobiliaria
     * @param int $anuncio
     * @return mixed
     */
    public function mensagensAnuncio(int $imobiliaria, int $anuncio)
    {
        return $this->request('GET', "imobiliarias/{$imobiliaria}/anuncios/{$anuncio}/mensagens");
    }

    /**
     * Todas as mensagens para uma imobiliária.
     *
     * @param int $imobiliaria
     * @return mixed
     */
    public function mensagensImobiliaria(int $imobiliaria)
    {
        return $this->request('GET', "imobiliarias/{$imobiliaria}/mensagens");
    }

    /**
     * Informação de um contato.
     *
     * @param int $imobiliaria
     * @param int $contato
     * @return mixed
     */
    public function contatos(int $imobiliaria, int $contato)
    {
        return $this->request('GET', "imobiliarias/{$imobiliaria}/contatos/{$contato}");
    }
}
