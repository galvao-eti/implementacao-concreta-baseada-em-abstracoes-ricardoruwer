<?php
namespace Alfa;

use Alfa\Abstracao\Entidade as Abstracao_Entidade;

class Entidade implements Abstracao_Entidade
{
    public $nome;
    public $colunas;
    public $valores;
    public $clausula;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->$nome;
    }

    public function create($colunas, $valores) {}
    public function update($colunas, $valores, $clausula) {}
    public function retrieve($colunas, $valores) {}
    public function delete($clausula) {}
}
