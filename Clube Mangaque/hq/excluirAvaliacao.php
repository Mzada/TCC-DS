<?php
    session_start();
    require_once 'conexaoBD.php';


    $data = json_decode(file_get_contents("php://input"), true);
    $id = intval($data['idavaliacao']);

    $sql = "DELETE FROM avaliacoes WHERE idavaliacao=$id";

    if ($conn->query($sql)) {
        echo json_encode(['sucesso' => true]);
    } else {
        echo json_encode(['sucesso' => false, 'erro' => $conn->error]);
    }
?>

