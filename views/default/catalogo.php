<?php require "views/default/include/header.php"; ?>

<?php require "views/default/include/navbar.php"; ?>

<main class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h1>Catálogo de Produtos</h1>
                <p class="text-muted">Encontre seus vinis favoritos</p>
            </div>
        </div>

        <div class="row">
            <?php if (empty($produtos)): ?>
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Nenhum produto disponível no momento.
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <?php if (!empty($produto['imagem'])): ?>
                                <img src="<?= htmlspecialchars($produto['imagem']) ?>" class="card-img-top" alt="<?= htmlspecialchars($produto['titulo']) ?>" style="height: 250px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                                    <i class="bi bi-image" style="font-size: 3rem;"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($produto['titulo']) ?></h5>
                                <p class="card-text text-muted small">
                                    <?php if (!empty($produto['artista'])): ?>
                                        <strong>Artista:</strong> <?= htmlspecialchars($produto['artista']) ?><br>
                                    <?php endif; ?>
                                    <?php if (!empty($produto['ano'])): ?>
                                        <strong>Ano:</strong> <?= htmlspecialchars($produto['ano']) ?><br>
                                    <?php endif; ?>
                                    <strong>Categoria:</strong> <?= htmlspecialchars($produto['categoria_nome'] ?? 'Sem categoria') ?>
                                </p>
                                <p class="card-text">
                                    <span class="text-muted" style="font-size: 0.85rem;">
                                        <?= substr(htmlspecialchars($produto['descricao'] ?? ''), 0, 50) ?>...
                                    </span>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></h5>
                                    <a href="?page=produto&id=<?= $produto['id'] ?>" class="btn btn-primary btn-sm">
                                        <i class="bi bi-eye me-1"></i>Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php require "views/default/include/footer.php"; ?>