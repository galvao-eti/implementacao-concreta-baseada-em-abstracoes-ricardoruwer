<?php
namespace Alfa;

use Alfa\Abstracao\SGBD as Abstracao_SGBD;

class SGBD implements Abstracao_SGBD
{
    public $conexao;
    public $tipo;
    protected $endereco;
    protected $porta;
    protected $senha;
    protected $usuario;

    function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Endereço
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Porta
     */
    public function setPorta($porta)
    {
        if (is_numeric($porta)) {
            $this->porta = $porta;
        }
    }

    public function getPorta()
    {
        return $this->porta;
    }

    /**
     * Usuário
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getSenha()
    {
        return $this->senha;
    }
}

