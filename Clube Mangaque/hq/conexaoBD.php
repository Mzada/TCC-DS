<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $banco = "mangaque"; 

    //Conexão com o banco de dados
    $conn = mysqli_connect($host, $usuario, $senha, $banco);
    // Define o charset para UTF-8
    mysqli_set_charset($conn, "utf8mb4");
        
    //Verifica a conexão    
    if (!$conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

?>