<?php

require_once "models/Usuario.php";

class UsuarioController
{
    private Usuario $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function login()
    {
        require "views/default/login.php";
    }

    public function autenticar()
    {
        $usuario = $this->usuario->login($_POST);

        if ($usuario) {

            $_SESSION['usuario'] = $usuario;

            header("Location: index.php");
            exit;
        }

        header("Location: ?page=login");
    }

    public function cadastro()
    {
        require "views/default/cadastro.php";
    }

    public function salvarCadastro()
    {
        $this->usuario->cadastrar($_POST);

        header("Location: ?page=login");
        exit;
    }

    public function logout()
    {
        unset($_SESSION['usuario']);

        header("Location: index.php");
        exit;
    }
}
?>