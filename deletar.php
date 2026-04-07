<?php
session_start();
require 'conexao.php';
require 'Tarefa.php';

// BUG CORRIGIDO: verificação de sessão que estava faltando
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$t = new Tarefa();

// BUG CORRIGIDO: verificar se a tarefa pertence ao usuário logado
// antes de deletar, evitando que um usuário delete tarefas de outro
$t->deletar($conn, $_GET['id'], $_SESSION['user']['id']);

header("Location: dashboard.php");
exit; // BUG CORRIGIDO: exit faltando após header()