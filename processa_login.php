<?php

session_start();

require 'config.php';
$nome = '';
if(isset($_SESSION['nome'])){
    $nome= $_SESSION['nome'];
}
//verifica se os capos estao com dados
if(isset($_POST ['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    $email = addslashes($_POST['email']);
    $senha = (addslashes($_POST['senha']));

    //verifica login e senha
    $sql = $pdo -> query(" SELECT * FROM users WHERE email = '$email' AND senha = '$senha' ");
    if($sql -> rowCount() > 0){
        $dado = $sql -> fetch();
        $_SESSION['id'] = $dado['id'];
        $_SESSION['nome'] = $dado['nome'];
        $_SESSION['email'] = $dado['email'];
        header("Location: home.php");

        exit();
    }  else {
        echo
        "
        <META HTTP-EQUIV=REFRESH CONTENT ='0; URL=index.php'>
        <script type=\"text/javascript\">
            alerta(\"Erro: Login ou senha incorreto\");
            </script>
            ";
            exit();
    }
}
?>