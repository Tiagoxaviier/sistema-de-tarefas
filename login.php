<?php
session_start();
require 'conexao.php';
require 'Usuario.php';

if(isset($_POST['login'])) {
    $u = new Usuario();
    $user = $u->login($conn, $_POST['email'], $_POST['senha']);

    if($user) {
        $_SESSION['user'] = $user; // ESSA LINHA É ESSENCIAL
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Erro ao logar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <form method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">
        <button name="login">Entrar</button>
    </form>

    <a href="cadastro.php">Criar conta</a>
</div>

</body>
</html>