<?php
namespace ImovelWeb\Contatos;

use ImovelWeb\Base\Base;

final class Mensagem extends Base
{
    /**
     * O smartLead de uma mensagem.
     *
     * @return mixed
     */
    public function smartLead(int $id)
    {
        return $this->request('GET', "mensagen/{$id}/smartLead");
    }

    /**
     * Uma mensagem pelo ID.
     *
     * @return mixed
     */
    public function visualizar(int $id)
    {
        return $this->request('GET', "mensagens/{$id}");
    }
}
