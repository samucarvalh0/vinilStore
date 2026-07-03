<?php require "views/default/include/header.php"; ?>

<?php require "views/default/include/navbar.php"; ?>

<main class="py-5">
    <div class="container">
        <h1 class="mb-4">Meus Pedidos</h1>

        <?php if (empty($pedidos)): ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>
                Você não tem nenhum pedido ainda.
            </div>
            <a href="?page=catalogo" class="btn btn-primary">
                <i class="bi bi-shopping-bag me-2"></i>Começar a Comprar
            </a>
        <?php else: ?>
            <div class="row">
                <?php foreach ($pedidos as $pedido): ?>
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">Pedido #<?= $pedido['id'] ?></h5>
                                        <p class="text-muted mb-2">
                                            <i class="bi bi-calendar me-2"></i>
                                            <?= date('d/m/Y H:i', strtotime($pedido['data'])) ?>
                                        </p>
                                        <p class="text-muted mb-0">
                                            <i class="bi bi-box-seam me-2"></i>
                                            <?php
                                                $statusColor = match($pedido['status']) {
                                                    'pendente' => 'warning',
                                                    'confirmado' => 'info',
                                                    'enviado' => 'primary',
                                                    'entregue' => 'success',
                                                    'cancelado' => 'danger',
                                                    default => 'secondary'
                                                };
                                            ?>
                                            <span class="badge bg-<?= $statusColor ?>"><?= ucfirst($pedido['status']) ?></span>
                                        </p>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <h5 class="text-success">R$ <?= number_format($pedido['total'], 2, ',', '.') ?></h5>
                                        <a href="?page=detalhe-pedido&id=<?= $pedido['id'] ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-2"></i>Ver Detalhes
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require "views/default/include/footer.php"; ?>