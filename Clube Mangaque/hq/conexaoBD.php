<?php

    $host = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $banco = "mangaque"; 

    //Conexão com o banco de dados
        $conn = mysqli_connect($host, $usuario, $senha, $banco);
        
    //Verifica a conexão    
        if (!$conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

?>