<?php
namespace GoEat;

session_start();

require '../vendor/autoload.php';

use GoEat\Mailer;

$encomenda = EncomendaPrato::find($_GET['id']);

$encomenda->update([['coluna' => 'situacao', 'valor' => 5, 'id' => $encomenda->getId()]]);
$encomenda->setSituacao(5);
Mailer::send($encomenda);


header('Location: encomendaRestaurante.php');
?>