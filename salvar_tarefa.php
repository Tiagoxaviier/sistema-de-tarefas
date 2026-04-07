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
$t->criar($conn, $_POST['titulo'], $_SESSION['user']['id']);

header("Location: dashboard.php");
exit; // BUG CORRIGIDO: exit faltando após header()