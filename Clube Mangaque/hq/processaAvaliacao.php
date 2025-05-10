<?php   

    session_start();
    require_once 'conexaoBD.php';

    $idUsuario = $_SESSION['IdUsuario'];
    $nota = $_POST['nota'] ?? '';
    $comentario = $conn->real_escape_string($_POST['comentario'] ?? '');
    $idObra = $_POST['idObra'] ?? '';

    //Valida se a nota foi preenchida
    if(empty($nota)) {
        header("Location: hqs.html?erro=nota");
        exit();
    }

    //Inserir nota no banco de dados
    $stmt = $conn->prepare("INSERT INTO avaliacoes (IdUsuario, nota, comentario, idObra) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $idUsuario, $nota, $comentario, $idObra);


    if ($stmt->execute()) {
        header("Location: hqs.html?sucesso=1");
        exit();
    } else {
        header("Location: hqs.html?erro=bd");
        exit();
    }
?>