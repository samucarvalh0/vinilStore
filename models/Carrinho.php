<?php

class Carrinho
{
    private const SESSION_KEY = 'carrinho';

    public function inicializar()
    {
        if (!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }
    }

    public function listar()
    {
        $this->inicializar();
        return $_SESSION[self::SESSION_KEY];
    }

    public function adicionar($produtoId, $quantidade = 1)
    {
        $this->inicializar();

        if (isset($_SESSION[self::SESSION_KEY][$produtoId])) {
            $_SESSION[self::SESSION_KEY][$produtoId]['quantidade'] += $quantidade;
        } else {
            require_once __DIR__ . "/Produtos.php";
            $produtoModel = new Produto();
            $produto = $produtoModel->buscarPorId($produtoId);

            if ($produto) {
                $_SESSION[self::SESSION_KEY][$produtoId] = [
                    'id' => $produto['id'],
                    'titulo' => $produto['titulo'],
                    'preco' => $produto['preco'],
                    'imagem' => $produto['imagem'] ?? '',
                    'quantidade' => $quantidade
                ];
            }
        }
    }

    public function remover($produtoId)
    {
        $this->inicializar();

        if (isset($_SESSION[self::SESSION_KEY][$produtoId])) {
            unset($_SESSION[self::SESSION_KEY][$produtoId]);
        }
    }

    public function limpar()
    {
        $_SESSION[self::SESSION_KEY] = [];
    }

    public function obterTotal()
    {
        $this->inicializar();
        $total = 0;

        foreach ($_SESSION[self::SESSION_KEY] as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        return $total;
    }

    public function obterQuantidadeItens()
    {
        $this->inicializar();
        $quantidade = 0;

        foreach ($_SESSION[self::SESSION_KEY] as $item) {
            $quantidade += $item['quantidade'];
        }

        return $quantidade;
    }

}
?>