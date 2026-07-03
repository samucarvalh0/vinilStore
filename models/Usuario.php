<?php

class Usuario
{

    public function login($dados)
    {
        global $conn;

        $email = trim($dados['email']);
        $senha = trim($dados['senha']);

        $sql = "SELECT * FROM clientes WHERE email = ? LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }

        return null;
    }

    public function cadastrar($dados)
    {
        global $conn;

        $nome = $dados['nome'] ?? '';
        $email = $dados['email'] ?? '';
        $senha = password_hash($dados['senha'] ?? '', PASSWORD_DEFAULT);
        $telefone = $dados['telefone'] ?? '';
        $endereco = $dados['endereco'] ?? '';

        $sql = "INSERT INTO clientes (nome, email, senha, telefone, endereco) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nome, $email, $senha, $telefone, $endereco);

        return $stmt->execute();
    }

    public function editar($id, $dados)
    {
        global $conn;

        $nome = $dados['nome'] ?? '';
        $telefone = $dados['telefone'] ?? '';
        $endereco = $dados['endereco'] ?? '';

        $sql = "UPDATE clientes SET nome = ?, telefone = ?, endereco = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nome, $telefone, $endereco, $id);

        return $stmt->execute();
    }

    public function buscarPorId($id)
    {
        global $conn;

        $sql = "SELECT * FROM clientes WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function contar()
    {
        global $conn;

        $sql = "SELECT COUNT(*) as total FROM clientes";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        return $row['total'] ?? 0;
    }

}
?>