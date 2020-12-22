<?php
namespace ImovelWeb\Informacao;

use ImovelWeb\Base\Base;

final class Multimidia extends Base
{
    /**
     * As especificações de um atributo de um campo de multimídia.
     *
     * @param int $campoPai
     * @param int $campoFilho
     * @return mixed
     */
    public function subCampo(int $campoPai, int $campoFilho)
    {
        return $this->request('GET', "informacao/multimidia/{$campoPai}/{$campoFilho}");
    }

    /**
     * As especificações de um atributo do multimidia.
     *
     * @param int $campo
     * @return mixed
     */
    public function campo(int $campo)
    {
        return $this->request('GET', "informacao/multimidia/{$campo}}");
    }
}
