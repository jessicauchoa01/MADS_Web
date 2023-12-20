<?php

namespace GoEat;

require '../../vendor/autoload.php';
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    http_response_code(200);
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadedImg = $_FILES['imgPerfil'];

    $chave = "segredodogoeat";

    $authorizationHeader = getallheaders()['Authorization'];

    $token = trim(str_replace("Bearer", "", $authorizationHeader));

    $tokenInfo = JWT::decode($token, new Key($chave, 'HS256'));

    $utilizador = Utilizador::find($tokenInfo->utilizador_id);

    $cliente = Cliente::find($utilizador->getEntidade());

    if (!empty($_FILES) && $_FILES['imgPerfil']['size'] != 0) {
        if (file_exists($_FILES['imgPerfil']['tmp_name'])) {
            copy($_FILES['imgPerfil']['tmp_name'], '../assets/imagensPerfil/' . $_FILES['imgPerfil']['name']);
        }
    }

    $cliente->update(
        [['coluna' => 'imgPerfil', 'valor' => '"assets/imagensPerfil/' . $_FILES['imgPerfil']['name'] . '"',
            'id' => $cliente->getId()]]
    );

    echo json_encode(["message" => "Imagem guardada"]);
    http_response_code(200);
    exit;
} else {
    echo json_encode(["message" => "Método não permitido"]);
    http_response_code(405);
    exit;
}