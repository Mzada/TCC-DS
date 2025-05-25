<?php
    session_start();
    require_once 'conexaoBD.php';

    $idUsuario = $_SESSION['IdUsuario'];

    $nomeCompleto = $_POST['nome_completo'] ?? '';
    $apelido = $_POST['apelido'] ?? '';
    $email = $_POST['email'] ?? '';

    $caminhafoto = null;

    //Verifica se a imagem foi enviada
    if(isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK){
        $extensao = pathinfo($_FILES['fotoPerfil']['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('perfil_').'.'.$extensao;
        $destino = './img/perfis/'.$novoNome;

        //cria a pasta se não existir
        if(!is_dir('img/perfis')){
            mkdir('img/perfis', 0777, ture);
        }

        if(move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $destino)){
            $caminhoFoto = $destino;
        }
    }

    // Atualiza perfil com ou sem imagem
    if($caminhoFoto){
        $stmt = $conn->prepare("UPDATE usuarios SET nome_completo = ?, apelido = ?, email = ?, fotoPerfil = ? WHERE IdUsuario = ?");
        $stmt->bind_param("ssssi", $nomeCompleto, $apelido, $email, $caminhoFoto, $idUsuario);
    }else{
        $stmt = $conn->prepare("UPDATE usuarios SET nome_completo = ?, apelido = ?, email = ? WHERE IdUsuario = ?");
        $stmt->bind_param("ssssi", $nomeCompleto, $apelido, $email, $idUsuario);
    }

    if ($stmt->execute()) {
        header("Location: perfil.html?sucesso=1");
        exit();
    } else {
        header("Location: perfil.html?erro=bd");
        exit();
    }

    $stmt->close();
    $conn->close();
?>