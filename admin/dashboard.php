<?php require __DIR__ . "/include/sidebar.php"; ?>
<?php require __DIR__ . "/include/header.php"; ?>

<div class="main-content">
    <div class="container-fluid">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Produtos</h5>
                        <h2><?= $totalProdutos ?></h2>
                        <p class="card-text small">Total de produtos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Pedidos</h5>
                        <h2><?= $totalPedidos ?></h2>
                        <p class="card-text small">Total de pedidos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        <h2><?= $totalCategorias ?></h2>
                        <p class="card-text small">Total de categorias</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Usuários</h5>
                        <h2><?= $totalUsuarios ?></h2>
                        <p class="card-text small">Clientes cadastrados</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Últimos Pedidos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($ultimosPedidos)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Nenhum pedido encontrado</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($ultimosPedidos as $pedido): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($pedido['id']) ?></td>
                                            <td><?= htmlspecialchars($pedido['cliente'] ?? 'Sem cliente') ?></td>
                                            <td><?= date('d/m/Y H:i', strtotime($pedido['data'])) ?></td>
                                            <td>
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
                                            </td>
                                            <td>R$ <?= number_format($pedido['total'], 2, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Atalhos Rápidos</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="?page=admin-produtos" class="list-group-item list-group-item-action">
                                <i class="bi bi-boxes me-2"></i>Gerenciar Produtos
                            </a>
                            <a href="?page=admin-categorias" class="list-group-item list-group-item-action">
                                <i class="bi bi-tags me-2"></i>Gerenciar Categorias
                            </a>
                            <a href="?page=admin-pedidos" class="list-group-item list-group-item-action">
                                <i class="bi bi-cart-check me-2"></i>Ver Todos os Pedidos
                            </a>
                            <a href="?page=cadProd" class="list-group-item list-group-item-action">
                                <i class="bi bi-plus-circle me-2"></i>Novo Produto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>