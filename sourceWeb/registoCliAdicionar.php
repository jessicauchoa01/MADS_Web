<?php

namespace GoEat;

require '../vendor/autoload.php';

session_start(); 

use GoEat\Utilizador;
use GoEat\Cliente;
use GoEat\Morada;

 if (empty($_POST['nome']) ||
    empty($_POST['nif']) ||
    empty($_POST['telemovel']) ||
    empty($_POST['rua']) ||
    empty($_POST['numPorta']) ||
    empty($_POST['codPostal']) ||
    empty($_POST['localidade']) ||
    empty($_POST['pais']) ||
    empty($_POST['email']) ||
    empty($_POST['password']) ||
    empty($_POST['confirmacao'])) {
    $mensagem = urlencode('Todos os campos são de preenchimento obrigatório.');
    header('Location: registoCliForm.php?erro=' . $mensagem);
    exit;
}  else {
    if (strlen($_POST['telemovel']) < 9 || strlen($_POST['telemovel']) > 9) {
        $mensagem = urlencode('A palavra-passe tem de ter no mínimo 8 caracteres.');
        header('Location: registoCliForm.php?erro=' . $mensagem);
        exit;
    }

    if (strlen($_POST['password']) < 8) {
        $mensagem = urlencode('A palavra-passe tem de ter no mínimo 8 caracteres.');
        header('Location: registoCliForm.php?erro=' . $mensagem);
        exit;
    }

    if ($_POST['password'] != $_POST['confirmacao']){
        $mensagem = urlencode('A palavra-passe e a confirmação tem que ser iguais.');
        header('Location: registoCliForm.php?erro=' . $mensagem);
        exit;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $mensagem = urlencode('O email tem que ser um endereço válido');
        header('Location: registoCliForm.php?erro=' . $mensagem);
        exit;
    }

    $resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $_POST['email']]]);

    if (count($resultados) != 0){
        $mensagem = urlencode('o email está a ser utilizado');
        header('Location: registoCliForm.php?erro=' . $mensagem);
        exit;
    }
}

$moradas = Morada::search([
['coluna' => 'rua', 'operador' => '=' ,'valor' => $_POST['rua']],
['coluna' => 'numPorta', 'operador' => '=' ,'valor' => $_POST['numPorta']],
['coluna' => 'codPostal', 'operador' => '=' ,'valor' => $_POST['codPostal']]]);

if (count($moradas) == 0){
    $morada = new Morada($_POST['rua'], $_POST['numPorta'], $_POST['codPostal'], $_POST['localidade'], $_POST['pais']);
    $morada->save();
}else{
    $morada = $moradas[0];
}

$cliente = new Cliente($_POST['nome'], $_POST['nif'], $_POST['telemovel'], $morada->getId(), 1);
$cliente->save();

$utilizador = new Utilizador($_POST['nome'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), 2, 1, $cliente->getId());
$utilizador->save();

$mensagem = urlencode('Registo efetuado com sucesso.');
header('Location: registoCliForm.php?sucesso=' . $mensagem);

