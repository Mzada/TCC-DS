<?php
    session_start();
    require_once 'conexaoBD.php';

    /*
    if (!isset($_SESSION['IdUsuario'])) {
        http_response_code(401);
        echo json_encode(['erro' => 'Usuário não autenticado']);
        exit;
    }*/

$data = json_decode(file_get_contents("php://input"), true);
$id = intval($data['idavaliacao']);

$sql = "DELETE FROM avaliacoes WHERE idavaliacao=$id";

if ($conn->query($sql)) {
    echo json_encode(['sucesso' => true]);
} else {
    echo json_encode(['sucesso' => false, 'erro' => $conn->error]);
}
?>

