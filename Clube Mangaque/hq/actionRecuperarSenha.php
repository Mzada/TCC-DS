<?php
    session_start();
    require_once 'conexaoBD.php';

   $email = $_POST['email'] ?? '';
   $novaSenha = $_POST['novaSenha'] ?? '';
   $confirmarSenha = $_POST['confirmarSenha'] ?? '';

   //Verifica se as senhas coincidem
   if($novaSenha !== $confirmarSenha){
    header("Location: recuperarSenha.html?erro=senha");
    exit();
   }

   //Verfica se o e-mail existe no banco de dados
   $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
   $stmt->bind_param("s", $email);
   $stmt->execute();
   $stmt->store_result();

   if($stmt->num_rows === 0){
    header("Location: recuperarSenha.html?erro=email");
    exit();
   }

   //Criptografa a nova senha
    $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
    $stmt->bind_param("ss", $senhaHash, $email);
    $stmt->execute();

   if($stmt->affected_rows > 0){
        header("Location: index.html?sucesso=1");
        exit();
   }else{
        header("Location: recuperarSenha.html?erro=db");
        exit();
   }
?>