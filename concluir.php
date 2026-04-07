<?php
require 'conexao.php';
require 'Tarefa.php';

$t = new Tarefa();
$t->concluir($conn, $_GET['id']);

header("Location: dashboard.php"); // BUG CORRIGIDO: redirecionamento que estava faltando
exit;