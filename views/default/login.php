<?php require "views/default/include/header.php"; ?>

<?php require "views/default/include/navbar.php"; ?>

<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Login</h2>

                        <form method="POST" action="?page=autenticar">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Entrar
                            </button>
                        </form>

                        <hr>

                        <p class="text-center text-muted">
                            Não tem uma conta?
                            <a href="?page=cadastro" class="text-primary fw-bold">Cadastre-se aqui</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require "views/default/include/footer.php"; ?>