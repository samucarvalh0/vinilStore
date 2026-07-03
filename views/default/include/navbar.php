<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand" href="?page=home">
            Sinth-vinil
        </a>

        <form class="d-flex d-lg-none mx-auto w-50">
            <input class="form-control form-control-sm" type="search" placeholder="Pesquisar...">
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarPrincipal">

            <!-- Menu -->
            <ul class="navbar-nav mx-auto text-center">

                <li class="nav-item">
                    <a class="nav-link" href="?page=catalogo">
                        Catálogo
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=sobre">
                        Sobre
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?page=contato">
                        Contato
                    </a>
                </li>

            </ul>

            <form class="d-none d-lg-flex ms-lg-3">

                <input class="form-control me-2" type="search" placeholder="Pesquisar...">

                <button class="btn btn-outline-light">
                    Buscar
                </button>

            </form>
            <div class="dropdown ms-3">

                <a class="text-white h3 text-decoration-none" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <i class="bi bi-person-circle"></i>

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <?php if (empty($_SESSION['usuario'])): ?>

                        <li>
                            <a class="dropdown-item" href="?page=login">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Entrar
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="?page=cadastro">
                                <i class="bi bi-person-plus me-2"></i>
                                Criar conta
                            </a>
                        </li>

                    <?php else: ?>

                        <li>
                            <span class="dropdown-item-text">
                                Olá,
                                <strong><?= $_SESSION['usuario']['nome'] ?></strong>
                            </span>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item" href="?page=meus-pedidos">
                                <i class="bi bi-bag me-2"></i>
                                Meus Pedidos
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item text-danger" href="?page=logout">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Sair
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>

            </div>

        </div>

    </div>

</nav>