<?php

require_once __DIR__ . "/../models/Admin.php";

class AdminController
{

    private Admin $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function login()
    {
        require "admin/login.php";
    }

    public function autenticar()
    {
        $admin = $this->admin->login($_POST);

        if ($admin) {

            $_SESSION['admin'] = $admin;

            header("Location: ?page=dashboard");
            exit;
        }

        header("Location: ?page=admin-login");
    }

    public function dashboard()
    {
        Auth::requireAdmin();

        require "admin/dashboard.php";
    }

    public function logout()
    {
        unset($_SESSION['admin']);

        header("Location: ?page=admin-login");
        exit;
    }

}
?>