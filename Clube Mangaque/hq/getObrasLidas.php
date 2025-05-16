<?php
session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

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
    
    $sql = "SELECT o.nome, o.autor, o.capa, o.ano_publicacao, a.comentario
            FROM avaliacoes a
            JOIN obras o ON a.idObra = o.idObra
            WHERE a.IdUsuario = ?
            ORDER BY a.dataAvaliacao DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    $obraslidas = [];
    while ($row = $result->fetch_assoc()){
        $obraslidas[] = $row;
    }

    /*foreach ($avaliacoes as &$avaliacao) {
    if (isset($avaliacao["autor"]) && !empty($avaliacao["autor"])) {
        $avaliacao["autor"] = explode(", ", $avaliacao["autor"]);
    } else {
        $avaliacao["autor"] = [];
    }
}*/

    echo json_encode($obraslidas, JSON_UNESCAPED_UNICODE);
?>