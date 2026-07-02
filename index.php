<?php

require_once "config/constants.php";
require_once "config/session.php";
require_once "config/database.php";
require_once "config/auth.php";

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'home':
        require_once "controllers/HomeController.php";
        (new HomeController())->index();
        break;

    case 'catalogo':
        require_once "controllers/ProdutoController.php";
        (new ProdutoController())->listar();
        break;

    case 'produto':
        require_once "controllers/ProdutoController.php";
        (new ProdutoController())->detalhes($_GET['id'] ?? null);
        break;

    case 'login':
        require_once "controllers/UsuarioController.php";
        (new UsuarioController())->login();
        break;

    case 'cadastro':
        require_once "controllers/UsuarioController.php";
        (new UsuarioController())->cadastro();
        break;

    case 'carrinho':
        require_once "controllers/CarrinhoController.php";
        (new CarrinhoController())->listar();
        break;

    case 'checkout':
        require_once "controllers/PedidoController.php";
        (new PedidoController())->checkout();
        break;

    case 'meus-pedidos':
        require_once "controllers/PedidoController.php";
        (new PedidoController())->listar();
        break;

    case 'sobre':
        require_once "controllers/HomeController.php";
        (new HomeController())->sobre();
        break;

    case 'contato':
        require_once "controllers/HomeController.php";
        (new HomeController())->contato();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada.";
}
?>