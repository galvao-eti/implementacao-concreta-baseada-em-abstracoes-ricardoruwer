<?php
require ('../autoload.php');

use Alfa\SGBD;
use Alfa\BaseDeDados;
use Alfa\Produto;
use Alfa\Entidade;

$servidor = new SGBD('mysql');
$servidor->setEndereco('localhost');
$servidor->setPorta(3366);
$servidor->setUsuario('ricardo');
$servidor->setSenha('');

$base = new BaseDeDados($servidor);
$base->setNome('pos');

$produto = new Produto($base);

try {
    $base->conectar();

    $id = $produto->create(
        ['nome, preco'],
        ['Nota 10 no trabalho', 0.00]
    );

    $result = $produto->retrieve('*', $id);
    echo "<pre>"; print_r($result); echo "</pre>";

    $produto->update(
        ['nome', 'preco'],
        ['NOTA DEZ!', '10.00'],
        $id
    );

    $result = $produto->retrieve('*', $id);
    echo "<pre>"; print_r($result); echo "</pre>";

    $produto->delete($id);

    $base->desconectar();
} catch (Exception $e) {
    echo $e->getMessage();
}

