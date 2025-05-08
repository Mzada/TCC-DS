<?php   

    session_start();
    require_once 'conexaoBD.php';

    $idUsuario = $_SESSION['IdUsuario'];
    $nota = $_POST['nota'] ?? '';
    $comentario = $conn->real_escape_string($_POST['comentario'] ?? '');

    //Valida se anota foi preenchida
    if(empty($nota)) {
        header("Location: hqs.html?erro=nota");
        exit();
    }

    //Inserir nota no banco de dados
    $stmt = $conn->prepare("INSERT INTO avaliacoes (IdUsuario, nota, comentario) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $idUsuario, $nota, $comentario);

    if ($stmt->execute()) {
        header("Location: hqs.html?sucesso=1");
        exit();
    } else {
        header("Location: hqs.html?erro=bd");
        exit();
    }
?>