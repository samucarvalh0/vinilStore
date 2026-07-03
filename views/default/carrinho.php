<?php require "views/default/include/header.php"; ?>

<?php require "views/default/include/navbar.php"; ?>

<main class="py-5">
    <div class="container">
        <h1 class="mb-4">Meu Carrinho</h1>

        <?php
            require_once "models/Carrinho.php";
            $carrinho = new Carrinho();
            $itens = $carrinho->listar();
            $total = $carrinho->obterTotal();
        ?>

        <?php if (empty($itens)): ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>
                Seu carrinho está vazio!
            </div>
            <a href="?page=catalogo" class="btn btn-primary">
                <i class="bi bi-shopping-bag me-2"></i>Continuar Comprando
            </a>
        <?php else: ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Quantidade</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($itens as $item): ?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($item['imagem'])): ?>
                                                <img src="<?= htmlspecialchars($item['imagem']) ?>" style="max-height: 50px;" class="me-2">
                                            <?php endif; ?>
                                            <?= htmlspecialchars($item['titulo']) ?>
                                        </td>
                                        <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                                        <td>
                                            <form method="POST" action="?page=atualizar-carrinho" class="d-inline">
                                                <input type="hidden" name="produto_id" value="<?= $item['id'] ?>">
                                                <input type="number" name="quantidade" value="<?= $item['quantidade'] ?>" min="1" class="form-control" style="width: 60px;">
                                            </form>
                                        </td>
                                        <td>R$ <?= number_format($item['preco'] * $item['quantidade'], 2, ',', '.') ?></td>
                                        <td>
                                            <a href="?page=remover-carrinho&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resumo do Pedido</h5>
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Frete:</span>
                                <strong>R$ 10,00</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h6>Total:</h6>
                                <h5 class="text-primary">R$ <?= number_format($total + 10, 2, ',', '.') ?></h5>
                            </div>
                            <a href="?page=checkout" class="btn btn-success w-100 mt-3">
                                <i class="bi bi-credit-card me-2"></i>Finalizar Compra
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require "views/default/include/footer.php"; ?>