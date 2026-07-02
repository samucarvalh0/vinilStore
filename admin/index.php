<?php

require_once "../config/constants.php";
require_once "../config/database.php";
require_once "../config/session.php";
require_once "../config/Auth.php";

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {

    case 'login':
        require "../controllers/AdminController.php";
        (new AdminController())->login();
        break;

    case 'autenticar':
        require "../controllers/AdminController.php";
        (new AdminController())->autenticar();
        break;

    case 'dashboard':
        require "../controllers/AdminController.php";
        (new AdminController())->dashboard();
        break;

    case 'produtos':
        require "../controllers/ProdutoController.php";
        (new ProdutoController())->listar();
        break;
}
?>