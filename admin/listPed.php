<?php require __DIR__ . "/include/sidebar.php"; ?>
<?php require __DIR__ . "/include/header.php"; ?>

<div class="main-content">
    <div class="container-fluid">
        <h1 class="mb-4">Gerenciamento de Pedidos</h1>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pedidos)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Nenhum pedido encontrado</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($pedidos as $pedido): ?>
                                    <tr>
                                        <td><strong>#<?= $pedido['id'] ?></strong></td>
                                        <td><?= $pedido['cliente'] ?? 'N/A' ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($pedido['data_pedido'] ?? date('Y-m-d H:i:s'))) ?></td>
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
                                        <td><strong>R$ <?= number_format($pedido['total'] ?? 0, 2, ',', '.') ?></strong></td>
                                        <td>
                                            <a href="?page=detalhePed&id=<?= $pedido['id'] ?>" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>