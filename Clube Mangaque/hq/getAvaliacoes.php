<?php
session_start();
    /*header('Content-Type: application/json');
    echo json_encode([
    'sessao_idUsuario' => $_SESSION['IdUsuario'] ?? null
    ]);
    exit;*/
    require_once 'conexaoBD.php';

            // Garante que o usuário está logado
        /*if (!isset($_SESSION['idUsuario'])) {
            http_response_code(401);
            echo json_encode(['erro' => 'Usuário não autenticado']);
            exit;
        }*/

    $idUsuario = $_SESSION['IdUsuario'];
    
    $sql = "SELECT a.nota, o.nome AS titulo, o.autor
            FROM avaliacoes a
            JOIN obras o ON a.idObra = o.idObra
            WHERE a.IdUsuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    $avaliacoes = [];
    while ($row = $result->fetch_assoc()){
        $avaliacoes[] = $row;
    }

    /*foreach ($avaliacoes as &$avaliacao) {
    if (isset($avaliacao["autor"]) && !empty($avaliacao["autor"])) {
        $avaliacao["autor"] = explode(", ", $avaliacao["autor"]);
    } else {
        $avaliacao["autor"] = [];
    }
}*/
    echo json_encode(["avaliacoes" => $avaliacoes]);
    exit();
?>

