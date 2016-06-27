<?php
namespace Alfa;

use Alfa\BaseDeDados;
use Alfa\Entidade;

abstract class ClasseEntidade extends Entidade
{
    protected $base;

    public function __construct(BaseDeDados $base)
    {
        $this->base = $base;
    }

    public function create($colunas, $valores)
    {
        $sql = "INSERT INTO $this->nome (" . implode("','", $colunas) . ")
            VALUES ('" . implode("','", $valores) . "')";

        if ( ! mysqli_query($this->base->conexao, $sql)) {
            throw new \Exception(mysqli_error($this->base->conexao));
        }

        return  mysqli_insert_id($this->base->conexao);
  }

    public function retrieve($colunas, $clausula)
    {
        $sql = "SELECT $colunas FROM $this->nome WHERE id = $clausula";

        if ( ! $result = mysqli_query($this->base->conexao, $sql)) {
            throw new \Exception(mysqli_error($this->base->conexao));
        }

        return mysqli_fetch_object($result);
    }

    public function update($colunas, $valores, $clausula)
    {
        $query = null;
        $dados = array_combine($colunas, $valores);

        foreach ($dados as $coluna => $valor) {
            $query .= $coluna . " = '" . $valor . "', ";
        }
        $query = substr($query, 0, -2);

        $sql = "UPDATE $this->nome SET $query WHERE id = $clausula";

        if ( ! $result = mysqli_query($this->base->conexao, $sql)) {
            throw new \Exception(mysqli_error($this->base->conexao));
        }
    }

    public function delete($clausula)
    {
        $sql = "DELETE FROM $this->nome WHERE id = $clausula";

        if ( ! $result = mysqli_query($this->base->conexao, $sql)) {
            throw new \Exception(mysqli_error($this->base->conexao));
        }
    }
}
