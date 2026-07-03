<?php require "views/default/include/header.php"; ?>

<?php require "views/default/include/navbar.php"; ?>

<main class="py-5">
    <div class="container">
        <h1 class="mb-4">Checkout</h1>

        <?php
            require_once "models/Carrinho.php";
            $carrinho = new Carrinho();
            $itens = $carrinho->listar();
            $total = $carrinho->obterTotal() + 10; // com frete
        ?>

        <?php if (empty($itens)): ?>
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Seu carrinho está vazio!
            </div>
            <a href="?page=catalogo" class="btn btn-primary">
                <i class="bi bi-shopping-bag me-2"></i>Continuar Comprando
            </a>
        <?php else: ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Dados de Entrega</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="?page=finalizar-pedido">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="nome" class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($_SESSION['usuario']['nome'] ?? '') ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_SESSION['usuario']['email'] ?? '') ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="telefone" class="form-label">Telefone</label>
                                        <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($_SESSION['usuario']['telefone'] ?? '') ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="endereco" class="form-label">Endereço Completo</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= htmlspecialchars($_SESSION['usuario']['endereco'] ?? '') ?>" required>
                                </div>

                                <hr>

                                <div class="card-header bg-primary text-white mt-4">
                                    <h5 class="mb-0">Método de Pagamento</h5>
                                </div>

                                <div class="mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pagamento" id="pix" value="pix" checked>
                                        <label class="form-check-label" for="pix">
                                            <strong>PIX</strong> - Pagamento imediato
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pagamento" id="cartao" value="cartao">
                                        <label class="form-check-label" for="cartao">
                                            <strong>Cartão de Crédito</strong> - Parcelado em até 3x
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pagamento" id="boleto" value="boleto">
                                        <label class="form-check-label" for="boleto">
                                            <strong>Boleto Bancário</strong> - Vencimento em 3 dias
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <a href="?page=carrinho" class="btn btn-outline-secondary btn-lg">
                                        <i class="bi bi-arrow-left me-2"></i>Voltar
                                    </a>
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="bi bi-check-circle me-2"></i>Confirmar Pedido
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resumo do Pedido</h5>
                            <hr>
                            <?php foreach ($itens as $item): ?>
                                <div class="d-flex justify-content-between mb-2 small">
                                    <span><?= htmlspecialchars($item['titulo']) ?> x<?= $item['quantidade'] ?></span>
                                    <strong>R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></strong>
                                </div>
                            <?php endforeach; ?>
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Frete:</span>
                                <strong>R$ 10,00</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h6>Total:</h6>
                                <h5 class="text-success">R$ <?= number_format($total, 2, ',', '.') ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require "views/default/include/footer.php"; ?>