<?php
namespace Alfa;

use Alfa\SGBD;

class BaseDeDados implements Abstracao\BaseDeDados
{
    public $conexao;
    public $dependencia;
    protected $nome;

    function __construct(SGBD $servidor)
    {
        $this->dependencia = $servidor;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function conectar()
    {
        if ($this->dependencia->tipo === 'mysql') {
            $this->conexao = mysqli_connect(
                $this->dependencia->getEndereco(),
                $this->dependencia->getUsuario(),
                $this->dependencia->getSenha(),
                $this->getNome()
            );
        }

        if ( ! $this->conexao) {
          throw new \Exception(mysqli_connect_error());
        }
    }

    public function desconectar()
    {
        mysqli_close($this->conexao);
    }
}
