<?php

require_once "models/Carrinho.php";

class CarrinhoController
{

    private Carrinho $carrinho;

    public function __construct()
    {
        $this->carrinho = new Carrinho();
    }

    public function listar()
    {
        require "views/carrinho.php";
    }

    public function adicionar($produto)
    {
        $this->carrinho->adicionar($produto);

        header("Location:?page=carrinho");
    }

    public function remover($produto)
    {
        $this->carrinho->remover($produto);

        header("Location:?page=carrinho");
    }

    public function limpar()
    {
        $this->carrinho->limpar();

        header("Location:?page=carrinho");
    }

}
?>