<?php

namespace GoEat;

require '../vendor/autoload.php';

session_start(); 

use GoEat\Cliente;
use GoEat\Utilizador;

$cliente = Cliente::find($_GET['id']);

$utilizadores = Utilizador::search([['coluna' => 'perfil', 'operador' => '=' ,'valor' => 3]
, ['coluna' => 'entidade', 'operador' => '=' ,'valor' => $cliente->getId()]]);

$utilizador = $utilizadores[0];
print_r($utilizador);

$cliente->update([['coluna' => 'estado', 'valor' => 2, 'id' => $cliente->getId()]]);
$utilizador->update([['coluna' => 'ativo', 'valor' => 2, 'id' => $utilizador->getId()]]);

header('Location: detalhes_cliente.php?id='. $_GET['id']);