<?php

require_once "models/Produtos.php";

class ProdutoController
{

    private Produto $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function listar()
    {
        $produtos = $this->produto->listar();

        require "views/catalogo.php";
    }

    public function detalhes($id)
    {
        $produto = $this->produto->buscarPorId($id);

        require "views/produto.php";
    }

    public function cadastrar()
    {
        Auth::requireAdmin();

        $this->produto->cadastrar($_POST);

        header("Location:?page=admin-produtos");
    }

    public function editar($id)
    {
        Auth::requireAdmin();

        $this->produto->editar($id,$_POST);

        header("Location:?page=admin-produtos");
    }

    public function excluir($id)
    {
        Auth::requireAdmin();

        $this->produto->excluir($id);

        header("Location:?page=admin-produtos");
    }

}
?>