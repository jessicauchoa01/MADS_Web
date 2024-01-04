<?php

namespace GoEat;

require '../vendor/autoload.php';

session_start();

 if (
    empty($_POST['nome']) ||
    empty($_POST['designacao']) ||
    empty($_POST['nif']) ||
    empty($_POST['telemovel']) ||
    empty($_POST['telefone']) ||
    empty($_POST['url']) ||
    empty($_FILES['imagem']) ||
    empty($_POST['rua']) ||
    empty($_POST['numPorta']) ||
    empty($_POST['codPostal']) ||
    empty($_POST['localidade']) ||
    empty($_POST['pais']) ||
    empty($_POST['abertura']) ||
    empty($_POST['fecho']) ||
    empty($_POST['email']) ||
    empty($_POST['password']) ||
    empty($_POST['confirmacao'])) {
    $mensagem = urlencode('Todos os campos são de preenchimento obrigatório.');
    header('Location: registoResForm.php?erro=' . $mensagem);
    exit;

}  else {
    if (!preg_match('/^\d{9}$/', $_POST['nif'])) {
        $mensagem = urlencode('Número de NIF inválido.');
        header('Location: registoResForm.php?erro=' . $mensagem);
        exit;
    }
    if (!preg_match('/^\d{9}$/', $_POST['telemovel']) || 
    !preg_match('/^\d{9}$/', $_POST['telefone']) ||
    !preg_match('/^\d{9}$/', $_POST['contactoResponsavel'])){
        $mensagem = urlencode('O telemovel/telefone tem de ter 9 números.');
        header('Location: registoResForm.php?erro=' . $mensagem);
        exit;
    }

    if (strlen($_POST['password']) < 8) {
        $mensagem = urlencode('A palavra-passe tem de ter no mínimo 8 caracteres.');
        header('Location: registoResForm.php?erro=' . $mensagem);
        exit;
    }

    if ($_POST['password'] != $_POST['confirmacao']){
        $mensagem = urlencode('A palavra-passe e a confirmação tem que ser iguais.');
        header('Location: registoResForm.php?erro=' . $mensagem);
        exit;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $mensagem = urlencode('O email tem que ser um endereço válido');
        header('Location: registoResForm.php?erro=' . $mensagem);
        exit;
    }

    $resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $_POST['email']]]);

    if (count($resultados) != 0){
        $mensagem = urlencode('o email está a ser utilizado');
        header('Location: registoResForm.php?erro=' . $mensagem);
        exit;
    }

     if (!empty($_FILES) && $_FILES['imagem']['size'] != 0) {
         if (file_exists($_FILES['imagem']['tmp_name'])) {
             copy($_FILES['imagem']['tmp_name'], 'assets/restaurantes/' . $_FILES['imagem']['name']);
         }
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

$restaurante = new Restaurante(
$_POST['nome'], 
$_POST['nif'], 
$_POST['telemovel'],
$morada->getId(),
4,
$_POST['telefone'],
$_POST['designacao'],
$_POST['abertura'],
$_POST['fecho'],
$_POST['url'],
$_POST['responsavel'], 
$_POST['contactoResponsavel'],
'assets/restaurantes/' . $_FILES['imagem']['name'],
empty($_POST['segunda']) ? 0 : 1,
empty($_POST['terca']) ? 0 : 1,
empty($_POST['quarta']) ? 0 : 1,
empty($_POST['quinta']) ? 0 : 1,
empty($_POST['sexta']) ? 0 : 1,
empty($_POST['sabado']) ? 0 : 1,
empty($_POST['domingo']) ? 0 : 1,
empty($_POST['mbway']) ? 0 : 1,
empty($_POST['visa']) ? 0 : 1,
empty($_POST['multibanco']) ? 0 : 1,
empty($_POST['numerario']) ? 0 : 1
);
$restaurante->save();

$utilizador = new Utilizador($_POST['nome'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), 3, 0, $restaurante->getId());
$utilizador->save();

$mensagem = urlencode('Registo efetuado com sucesso.');
header('Location: registoResForm.php?sucesso=' . $mensagem);