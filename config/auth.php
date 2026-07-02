<?php

class Auth
{
    public static function check()
    {
        return isset($_SESSION['usuario']);
    }

    public static function admin()
    {
        return isset($_SESSION['admin']);
    }

    public static function requireLogin()
    {
        if (!self::check()) {

            header("Location:?page=login");
            exit;

        }
    }

    public static function requireAdmin()
    {
        if (!self::admin()) {

            header("Location:?page=admin-login");
            exit;

        }
    }
}
?>