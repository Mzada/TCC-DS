<?php
    session_start();
    include_once("conexaoBD.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //Consulta no banco
    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) === 1){
        $usuario = mysqli_fetch_assoc($resultado);

        $_SESSION['IdUsuario'] = $usuario['idUsuario'];
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: ../index.php");
    }else{
        echo "E-mail não encontrado ou senha inválidos";
    }

?>