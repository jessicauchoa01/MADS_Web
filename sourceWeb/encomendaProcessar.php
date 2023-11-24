<?php
namespace GoEat;

session_start();

require '../vendor/autoload.php';

use GoEat\Mailer;

$encomenda = EncomendaPrato::find($_GET['id']);

switch ($encomenda->getSituacao()) {
    case 'Submetida':
        $encomenda->update([['coluna' => 'situacao', 'valor' => 2, 'id' => $encomenda->getId()]]);
        $encomenda->setSituacao(2);
        Mailer::send($encomenda);
        break;
    case 'Em Processamento':
        $encomenda->update([['coluna' => 'situacao', 'valor' => 3, 'id' => $encomenda->getId()]]);
        $encomenda->setSituacao(3);
        Mailer::send($encomenda);
        break;
    case 'Por Levantar':
        $encomenda->update([['coluna' => 'situacao', 'valor' => 4, 'id' => $encomenda->getId()]]);
        $encomenda->setSituacao(4);
        Mailer::send($encomenda);
        break;
}


header('Location: encomendaRestaurante.php');
?>