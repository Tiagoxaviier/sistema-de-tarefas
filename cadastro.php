<?php
require 'conexao.php';
require 'Usuario.php';

if(isset($_POST['cadastro'])) {
    $u = new Usuario();
    $u->cadastrar($conn, $_POST['nome'], $_POST['email'], $_POST['senha']);
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Cadastro</h2>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">
        <button name="cadastro">Cadastrar</button>
    </form>

    <a href="login.php">Já tenho conta</a>
</div>

</body>
</html>