<?php
session_start();
require 'conexao.php';
require 'Tarefa.php';

// Protege a página: redireciona se não estiver logado
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$t = new Tarefa();
$tarefas = $t->listar($conn, $_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Olá, <?= htmlspecialchars($_SESSION['user']['nome']) ?>!</h2>

    <form method="POST" action="adicionar_tarefa.php">
        <input type="text" name="titulo" placeholder="Nova tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        <?php foreach($tarefas as $tarefa): ?>
            <li class="<?= $tarefa['status'] === 'concluida' ? 'concluida' : '' ?>">
                <?= htmlspecialchars($tarefa['titulo']) ?>

                <?php if($tarefa['status'] !== 'concluida'): ?>
                    <a href="concluir.php?id=<?= $tarefa['id'] ?>">✔ Concluir</a>
                <?php endif; ?>

                <a href="deletar.php?id=<?= $tarefa['id'] ?>">✖ Deletar</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="logout.php">Sair</a>
</div>

</body>
</html>