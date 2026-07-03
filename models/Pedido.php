<?php

class Pedido
{

    public function listar($usuario = null)
    {
        global $conn;

        if ($usuario !== null) {
            $sql = "SELECT p.*, u.nome as cliente FROM pedidos p
                    LEFT JOIN usuarios u ON p.id_usuario = u.id
                    WHERE p.id_usuario = ?
                    ORDER BY p.data_pedido DESC";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $usuario);
            $stmt->execute();
        } else {
            $sql = "SELECT p.*, u.nome as cliente FROM pedidos p
                    LEFT JOIN clientes u ON p.cliente_id = u.id
                    ORDER BY p.data DESC";

            $result = $conn->query($sql);
            return $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
        }

        $result = $stmt->get_result();
        return $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function buscar($id)
    {
        global $conn;

        $sql = "SELECT p.*, u.nome as cliente FROM pedidos p
                LEFT JOIN clientes u ON p.cliente_id = u.id
                WHERE p.id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function finalizar($dados)
    {
        global $conn;

        $usuarioId = $dados['cliente_id'] ?? 0;
        $total = (float) ($dados['total'] ?? 0);
        $status = $dados['status'] ?? 'pendente';
        $dataPedido = date('Y-m-d H:i:s');

        $sql = "INSERT INTO pedidos (cliente_id, total, status, data) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("idss", $usuarioId, $total, $status, $dataPedido);

        if ($stmt->execute()) {
            return $conn->insert_id;
        }

        return false;
    }

    public function contar()
    {
        global $conn;

        $sql = "SELECT COUNT(*) as total FROM pedidos";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        return $row['total'] ?? 0;
    }

    public function listarUltimos($limite = 5)
    {
        global $conn;

        $sql = "SELECT p.id, p.cliente_id, p.data, p.status, p.total, u.nome as cliente
                FROM pedidos p
                LEFT JOIN clientes u ON p.cliente_id = u.id
                ORDER BY p.data DESC
                LIMIT ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $limite);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function listarPorUsuario($usuarioId)
{
    global $conn;

    $sql = "SELECT * FROM pedidos
            WHERE cliente_id = ?
            ORDER BY data DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuarioId);
    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

}
?>