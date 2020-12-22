<?php
namespace ImovelWeb\Informacao;

use ImovelWeb\Base\Base;

final class Lancamento extends Base
{
    /**
     * As especificações de um atributo de um campo do lançamento.
     *
     * @param int $campoPai
     * @param int $campoFilho
     * @return mixed
     */
    public function subCampo(int $campoPai, int $campoFilho)
    {
        return $this->request('GET', "informacao/lancamento/{$campoPai}/{$campoFilho}");
    }

    /**
     * As especificações de um atributo do lançamento.
     *
     * @param int $campo
     * @return mixed
     */
    public function campo(int $campo)
    {
        return $this->request('GET', "informacao/lancamento/{$campo}}");
    }
}
