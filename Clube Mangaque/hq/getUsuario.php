<?php
    session_start();
    //var_dump($_SESSION);
    require_once 'conexaoBD.php';

    /*if (!isset($_SESSION['idUsuario'])) {
        http_response_code(401);
        echo json_encode(["erro" => "Usuário não logado"]);
        exit;
    }*/

    //$_SESSION['IdUsuario'] = 6;

    $idUsuario = $_SESSION['IdUsuario'];
    $stmt = $conn->prepare("SELECT nome_completo, apelido, email FROM usuarios WHERE IdUsuario = ?");
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    echo json_encode($usuario);
?>
