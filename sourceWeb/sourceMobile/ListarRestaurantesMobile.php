<?php

namespace GoEat;
require '../../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200);
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $restaurantes = Restaurante::search([['coluna' => 'estado', 'operador' => '=', 'valor' => 1]]);

    $today = date('l');

    foreach($restaurantes as $restaurante){
        if (!empty($restaurante->getEmenta())) {
            if ($restaurante->getOpen($today) == 1){
                $resultado[] = [
                    'id' => $restaurante->getId(),
                    'nome' => $restaurante->getNome(),
                    'imagem' => $restaurante->getImagem(),
                ];
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode(array_reverse($resultado));
    http_response_code(200);
}