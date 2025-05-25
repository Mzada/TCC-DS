<?php
    session_start();

    require_once 'conexaoBD.php';

    $idUsuario = $_SESSION['IdUsuario'];
    $stmt = $conn->prepare("SELECT nome_completo, apelido, email, fotoPerfil FROM usuarios WHERE IdUsuario = ?");
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    echo json_encode($usuario);
?>
