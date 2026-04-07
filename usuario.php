<?php
class Usuario {

    public function cadastrar($conn, $nome, $email, $senha) {
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);
    }

    public function login($conn, $email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user && password_verify($senha, $user['senha'])) {
            return $user;
        }

        return false;
    }
}