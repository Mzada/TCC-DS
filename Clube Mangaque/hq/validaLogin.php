<?php
    session_start();
    include_once("conexaoBD.php");

    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = $_POST['senha'];

    //Consulta no banco
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) === 1){
        $usuario = mysqli_fetch_assoc($resultado);

        if(password_verify($senha, $usuario['senha'])){
            $_SESSION['IdUsuario'] = $usuario['idUsuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];

            header("Location: perfil.php");
            exit;
        }else{
            header("Location: index.php?erro=senha");
            exit();
        }   
    }else{
        header("Location: index.php?erro=email");
        exit();
    }

?>