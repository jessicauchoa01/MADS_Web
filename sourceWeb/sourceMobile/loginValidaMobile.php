<?php
namespace GoEat;

require '../../vendor/autoload.php';
use \Firebase\JWT\JWT;

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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));

    if (empty($data->email) || empty($data->password)) {
        echo json_encode(["message" => "Campos obrigatórios ausentes"]);
        http_response_code(400);
        exit;
    }

    $resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $data->email]]);

    if (count($resultados) !== 1) {
        echo json_encode(["message" => "Não existe nenhum utilizador com este e-mail"]);
        http_response_code(401);
        exit;
    }

    $utilizador = $resultados[0];

    if ($utilizador->getAtivo() == 1 && $utilizador->getPerfil() == 'Cliente') {
        if (password_verify($data->password, $utilizador->getPassword())) {
            $payload = [
                'utilizador_id' => $utilizador->getId(),
                'perfil' => $utilizador->getPerfil(),
                'ativo' => $utilizador->getAtivo()
            ];

            $chave = "segredodogoeat";

            $token = JWT::encode($payload, $chave, 'HS256');

            echo json_encode(["token" => $token]);
            http_response_code(200);
            exit;
        } else {
            echo json_encode(["message" => "Credenciais inválidas"]);
            http_response_code(401);
            exit;
        }
    } else {
        echo json_encode(["message" => "E-mail Inválido."]);
        http_response_code(401);
        exit;
    }
} else {
    echo json_encode(["message" => "Método não permitido"]);
    http_response_code(405);
    exit;
}