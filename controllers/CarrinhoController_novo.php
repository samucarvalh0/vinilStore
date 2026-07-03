<?php

require_once __DIR__ . "/../models/Carrinho.php";

class CarrinhoController
{
    private Carrinho $carrinho;

    public function __construct()
    {
        $this->carrinho = new Carrinho();
    }

    public function listar()
    {
        require "views/default/carrinho.php";
    }

    public function adicionar()
    {
        $produtoId = $_POST['produto_id'] ?? null;
        $quantidade = (int) ($_POST['quantidade'] ?? 1);

        if ($produtoId && $quantidade > 0) {
            $this->carrinho->adicionar($produtoId, $quantidade);
        }

        header("Location: ?page=carrinho");
        exit;
    }

    public function remover($produtoId)
    {
        if ($produtoId) {
            $this->carrinho->remover($produtoId);
        }

        header("Location: ?page=carrinho");
        exit;
    }

    public function atualizar()
    {
        $produtoId = $_POST['produto_id'] ?? null;
        $quantidade = (int) ($_POST['quantidade'] ?? 1);

        if ($produtoId && $quantidade > 0) {
            $this->carrinho->remover($produtoId);
            $this->carrinho->adicionar($produtoId, $quantidade);
        } elseif ($produtoId && $quantidade <= 0) {
            $this->carrinho->remover($produtoId);
        }

        header("Location: ?page=carrinho");
        exit;
    }

    public function limpar()
    {
        $this->carrinho->limpar();

        header("Location: ?page=catalogo");
        exit;
    }
}
?>
