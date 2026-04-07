<?php
class Tarefa {

    public function criar($conn, $titulo, $usuario_id) {
        $sql = "INSERT INTO tarefas (titulo, usuario_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$titulo, $usuario_id]);
    }

    public function listar($conn, $usuario_id) {
        $sql = "SELECT * FROM tarefas WHERE usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll();
    }

    public function concluir($conn, $id) {
        // BUG CORRIGIDO: era $conn->query() com SQL Injection
        $stmt = $conn->prepare("UPDATE tarefas SET status='concluida' WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function deletar($conn, $id, $usuario_id) {
        // BUG CORRIGIDO 1: era $conn->query() com SQL Injection
        // BUG CORRIGIDO 2: agora verifica se a tarefa pertence ao usuário logado
        $stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $usuario_id]);
    }
}