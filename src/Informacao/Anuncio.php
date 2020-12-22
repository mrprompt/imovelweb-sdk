<?php
namespace ImovelWeb\Informacao;

use ImovelWeb\Base\Base;

final class Anuncio extends Base
{
    /**
     * As especificações de um atributo de um campo do anúncio.
     *
     * @param int $campoPai
     * @param int $campoFilho
     * @return mixed
     */
    public function subCampo(int $campoPai, int $campoFilho)
    {
        return $this->request('GET', "informacao/anuncio/{$campoPai}/{$campoFilho}");
    }

    /**
     * As especificações de um campo do anúncio.
     *
     * @param int $campo
     * @return mixed
     */
    public function campo(int $campo)
    {
        return $this->request('GET', "informacao/anuncio/{$campo}}");
    }
}
