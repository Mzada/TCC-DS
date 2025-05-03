<?php
    session_start();
    require_once 'conexaoBD.php';

    $idUsuario = $_SESSION['IdUsuario'];

    $nomeCompleto = $_POST['nome_completo'] ?? '';
    $apelido = $_POST['apelido'] ?? '';
    $email = $_POST['email'] ?? '';


    $stmt = $conn->prepare("UPDATE usuarios SET nome_completo = ?, apelido = ?, email = ? WHERE IdUsuario = ?");

    $stmt->bind_param("sssi", $nomeCompleto, $apelido, $email, $idUsuario);

    if ($stmt->execute()) {
        header("Location: perfil.html?sucesso=1");
        exit();
    } else {
        header("Location: perfil.html?erro=bd");
        exit();
    }

    $stmt->close();
    $conn->close();
?>