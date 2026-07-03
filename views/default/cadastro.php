<?php require "views/default/include/header.php"; ?>

<?php require "views/default/include/navbar.php"; ?>

<main class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Criar Conta</h2>

                        <form method="POST" action="?page=salvarCadastro">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone">
                            </div>

                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco">
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>

                            <div class="mb-4">
                                <label for="senha_confirm" class="form-label">Confirmar Senha</label>
                                <input type="password" class="form-control" id="senha_confirm" name="senha_confirm" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-person-plus me-2"></i>Criar Conta
                            </button>
                        </form>

                        <hr>

                        <p class="text-center text-muted">
                            Já tem uma conta?
                            <a href="?page=login" class="text-primary fw-bold">Faça login aqui</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require "views/default/include/footer.php"; ?>