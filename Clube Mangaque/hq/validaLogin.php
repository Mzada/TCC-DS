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
            $_SESSION['IdUsuario'] = $usuario['IdUsuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];

            header("Location: perfil.html");
            exit;
        }else{
            header("Location: index.html?erro=senha");
            exit();
        }   
    }else{
        header("Location: index.html?erro=email");
        exit();
    }

?>