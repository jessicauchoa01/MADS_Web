<?php
namespace GoEat;

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

require '../../vendor/autoload.php';

// Habilita o CORS para permitir solicitações entre diferentes domínios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Método permitido para a solicitação
header("Access-Control-Allow-Methods: POST");

// Permite cabeçalhos específicos
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Inicia a sessão
session_start();

// Verifica se o método da solicitação é POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do corpo da solicitação
    $data = json_decode(file_get_contents("php://input"));

    // Verifica se os campos necessários estão presentes
    if (empty($data->email) || empty($data->password)) {
        echo json_encode(["message" => "Campos obrigatórios ausentes"]);
        http_response_code(400);
        exit;
    }

    // Procura o utilizador pelo e-mail
    $resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $data->email]]);

    // Verifica se há exatamente um utilizador com o e-mail fornecido
    if (count($resultados) !== 1) {
        echo json_encode(["message" => "Não existe nenhum utilizador com este e-mail"]);
        http_response_code(401);
        exit;
    }

    $utilizador = $resultados[0];

    // Verifica se o utilizador está ativo
    if ($utilizador->getAtivo() == 1) {
        // Verifica a correspondência da senha
        if (password_verify($data->password, $utilizador->getPassword())) {
            $_SESSION['perfil'] = $utilizador->getPerfil();
            $_SESSION['id'] = $utilizador->getId();
            $_SESSION['carrinho'] = [];
            echo json_encode(["message" => "Autenticação bem-sucedida"]);
            http_response_code(200);
            exit;
        } else {
            echo json_encode(["message" => "Credenciais inválidas"]);
            http_response_code(401);
            exit;
        }
    } else {
        echo json_encode(["message" => "Utilizador inativo. Contacte o suporte."]);
        http_response_code(401);
        exit;
    }
} else {
    // Se o método da solicitação não for POST
    echo json_encode(["message" => "Método não permitido"]);
    http_response_code(405);
    exit;
}
