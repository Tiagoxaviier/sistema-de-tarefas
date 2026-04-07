# ✅ To-Do List em PHP

Sistema de gerenciamento de tarefas desenvolvido em PHP com MySQL, criado como projeto acadêmico. Permite que cada usuário crie uma conta, faça login e gerencie suas próprias tarefas de forma segura.

---

## 📋 Funcionalidades

- Cadastro e login de usuários
- Criação de tarefas vinculadas ao usuário logado
- Listagem de tarefas por usuário
- Marcar tarefa como concluída
- Deletar tarefa
- Logout com encerramento de sessão
- Proteção contra SQL Injection com PDO e Prepared Statements
- Senhas criptografadas com `password_hash()`
- Controle de acesso por sessão em todas as páginas

---

## 🛠️ Tecnologias utilizadas

- PHP 8.2
- MySQL
- PDO (PHP Data Objects)
- Apache (XAMPP)
- HTML5 e CSS3

---

## 📁 Estrutura do projeto

```
/
├── conexao.php          # Configuração e conexão com o banco de dados
├── Usuario.php          # Classe com métodos de cadastro e login
├── Tarefa.php           # Classe com métodos de criar, listar, concluir e deletar tarefas
├── cadastro.php         # Página de cadastro de novo usuário
├── login.php            # Página de login
├── logout.php           # Encerra a sessão do usuário
├── dashboard.php        # Página principal com listagem de tarefas
├── adicionar_tarefa.php # Processa a criação de nova tarefa
├── concluir.php         # Marca uma tarefa como concluída
├── deletar.php          # Deleta uma tarefa
└── style.css            # Estilos da aplicação
```

---

## 🗄️ Banco de dados

Crie um banco de dados chamado `todo_php` e execute o SQL abaixo para criar as tabelas:

```sql
CREATE DATABASE todo_php CHARACTER SET utf8 COLLATE utf8_general_ci;

USE todo_php;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    status ENUM('pendente', 'concluida') DEFAULT 'pendente',
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
```

---

## 🚀 Como rodar o projeto

1. Instale o [XAMPP](https://www.apachefriends.org/)
2. Clone este repositório dentro da pasta `htdocs`:
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```
3. Inicie o **Apache** e o **MySQL** pelo painel do XAMPP
4. Acesse o **phpMyAdmin** em `http://localhost/phpmyadmin` e execute o SQL acima
5. Acesse o projeto em:
   ```
   http://localhost/seu-repositorio/cadastro.php
   ```

---

## 🔒 Segurança implementada

| Recurso | Descrição |
|---|---|
| Prepared Statements | Todas as queries usam `prepare/execute`, impedindo SQL Injection |
| `password_hash()` | Senhas nunca são salvas em texto puro no banco |
| Verificação de sessão | Páginas protegidas redirecionam para o login se não houver sessão ativa |
| Verificação de dono | Ao deletar, o sistema confirma que a tarefa pertence ao usuário logado |

---

## 👨‍🎓 Autor

Desenvolvido como projeto acadêmico.
