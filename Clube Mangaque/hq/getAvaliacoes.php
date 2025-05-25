<?php
session_start();
    require_once 'conexaoBD.php';
    $idUsuario = $_SESSION['IdUsuario'];
    
    $sql = "SELECT a.idavaliacao, a.nota, o.nome AS titulo, o.autor, o.capa, o.ano_publicacao, a.comentario
            FROM avaliacoes a
            JOIN obras o ON a.idObra = o.idObra
            WHERE a.IdUsuario = ?
            ORDER BY a.dataAvaliacao DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    $avaliacoes = [];
    while ($row = $result->fetch_assoc()){
        $avaliacoes[] = $row;
    }

    echo json_encode(["avaliacoes" => $avaliacoes]);
    exit();
?>

