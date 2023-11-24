<?php

namespace GoEat;

require '../vendor/autoload.php';

session_start(); 

use GoEat\Restaurante;
use GoEat\Utilizador;



$restaurante = Restaurante::find($_GET['id']);

$utilizadores = Utilizador::search([['coluna' => 'perfil', 'operador' => '=' ,'valor' => 3]
, ['coluna' => 'entidade', 'operador' => '=' ,'valor' => $restaurante->getId()]]);

$utilizador = $utilizadores[0];
print_r($utilizador);

$restaurante->update([['coluna' => 'estado', 'valor' => 1, 'id' => $restaurante->getId()]]);
$utilizador->update([['coluna' => 'ativo', 'valor' => 1, 'id' => $utilizador->getId()]]);

header('Location: detalhes_restaurante.php?id='. $_GET['id']);