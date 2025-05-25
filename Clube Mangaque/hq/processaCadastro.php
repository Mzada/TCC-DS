<?php
    session_start();
    require_once 'conexaoBD.php';

    //Coletar dados do formulário
    $nome = $_POST['nomeCompleto'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];
    $dataNascimento = $_POST['dataNascimento'];

    //Verifica a idade mínima de 16 anos
    $hoje = new DateTime();
    $nascimento = new DateTime($dataNascimento);
    $idade = $hoje->diff($nascimento)->y;

    if ($idade < 16) {
        header("Location: cadastro.html?erro=idade"); // Redireciona a mensagem de erro para a página de cadastro
        exit();
    }

    //Verifica se as senhas são iguais
    if ($senha !== $confirmarSenha) {
        header("Location: cadastro.html?erro=senha"); // Redireciona a mensagem de erro para a página de cadastro
        exit();
    }

    //Criptografar a senha
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    //Verifica se o email já está cadastrado
    $sql_verifica = "SELECT * FROM usuarios WHERE email = ?";
    $stmt_verifica = mysqli_prepare($conn, $sql_verifica);
    mysqli_stmt_bind_param($stmt_verifica, "s", $email);
    mysqli_stmt_execute($stmt_verifica);
    mysqli_stmt_store_result($stmt_verifica);

    if (mysqli_stmt_num_rows($stmt_verifica) > 0) {
        header("Location: cadastro.html?erro=email"); // Redireciona a mensagem de erro para a página de cadastro
        exit();
    }

    mysqli_stmt_close($stmt_verifica);

    //Inserir os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome_completo, apelido, email, senha, data_nascimento) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }


    $stmt->bind_param("sssss", $nome, $apelido, $email, $senhaCriptografada, $dataNascimento);

    if($stmt->execute()){
        header("Location: cadastro.html?sucesso=1"); // Redireciona para a página de login com sucesso
        exit();
    } else {
        header("Location: cadastro.html?erro=bd"); // Redireciona a mensagem de erro para a página de cadastro
        exit();
    }

    $stmt->close();
    $conn->close();

?>
