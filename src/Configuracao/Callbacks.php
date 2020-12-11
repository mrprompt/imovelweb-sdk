<?php
namespace ImovelWeb\Configuracao;

use ImovelWeb\Base\Base;

final class Callbacks extends Base
{
    /**
     * Obter configuracoes Callback
     *
     * @return mixed
     */
    public function listar()
    {
        return $this->request('GET', 'configuracao/callbacks');
    }

    /**
     * Configuracao Callback
     *
     * @param array $configuracoes
     * @return mixed
     */
    public function atualizar(array $configuracoes)
    {
        $data = ["configuracionCallback" => $configuracoes];

        return $this->request("PUT", "configuracao/callbacks", $data, __METHOD__);
    }
}
