<?php

require_once __DIR__ . "/../models/Pedido.php";

class PedidoController
{

    private Pedido $pedido;

    public function __construct()
    {
        $this->pedido = new Pedido();
    }

    public function checkout()
    {
        Auth::requireLogin();

        require "views/default/checkout.php";
    }

    public function finalizar()
    {
        Auth::requireLogin();

        $usuarioId = $_SESSION['usuario']['id'] ?? 0;

        require_once __DIR__ . "/../models/Carrinho.php";
        $carrinho = new Carrinho();
        $itens = $carrinho->listar();

        if (empty($itens)) {
            header("Location: ?page=carrinho");
            exit;
        }

        $carrinhoModel = new Carrinho();
        $total = $carrinhoModel->obterTotal() + 10; // com frete

        $pedidoId = $this->pedido->finalizar([
            'cliente_id' => $usuarioId,
            'total' => $total,
            'status' => 'pendente'
        ]);

        if ($pedidoId) {
            $carrinhoModel->limpar();
            header("Location: views./default/confirmacao.php" . $pedidoId);
            exit;
        }

        header("Location: ?page=checkout");
        exit;
    }

    public function detalhe($id)
    {
        Auth::requireLogin();

        $pedido = $this->pedido->buscar($id);

        if (!$pedido) {
            header("Location: ?page=meus-pedidos");
            exit;
        }

        require "./detalhePed.php";
    }

    public function listar()
{
    Auth::requireLogin();

    $usuarioId = $_SESSION['usuario']['id'];

    $pedidos = $this->pedido->listarPorUsuario($usuarioId);

    require "views/default/pedidos.php";
}

    public function listarAdmin()
    {
        Auth::requireAdmin();

        $pedidos = $this->pedido->listar();

        require __DIR__ . "/../admin/listPed.php";
    }

}
?>