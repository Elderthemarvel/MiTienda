<!DOCTYPE html>
<html lang="es-GT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing | Saluredi</title>

    <!-- link styles -->
    <link rel="stylesheet" href="<?= base_url('/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/icons/css/line-awesome.min.css') ?>">
</head>

<body>
    <!-- Contenedor general -->
    <main class="container-general" id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg py-3 sticky-top shadow-sm navbar-color">
            <div class="container-fluid">
                <section class="d-flex gap-3">
                    <button type="button" class="btn btn-light d-lg-none d-block" id="toggleSidebar1">
                        <i class="las la-stream text-primary fs-5"></i>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="<?= base_url('images/logo.png')?>" width="100px" alt="logo">
                    </a>
                </section>

                <section class="d-flex align-items-center">

                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="image-user">
                                <img src="<?= base_url('images/avatar.png')?>"alt="logo">
                            </div>
                        </a>
                        <ul class="dropdown-menu position-absolute dropdown-menu-end w-200">
                            <li class="d-flex align-items-center border-bottom gap-3 p-3 mb-2">
                                <div class="image-user-1">
                                <img src="<?= base_url('images/avatar.png')?>"alt="logo">
                                </div>
                                <div>
                                    <div class="fw-semibold">Hola, Wilder</div>
                                   <!-- <div>
                                        <a href="" class="nav-link text-primary">Ver mi perfil</a>
                                    </div>-->
                                </div>
                            </li>
                            <!-- <li><a class="dropdown-item small" href="#"><i class="las la-hand-holding-usd fs-5 me-2"></i> Mi suscripción</a></li>
                            <li><a class="dropdown-item small" href="#"><i class="las la-cog fs-5 me-2"></i> Configuración</a></li>-->
                            <li><a class="dropdown-item small text-danger" href="#"><i class="las la-power-off fs-5 me-2"></i> Cerrar sesión</a></li> 
                        </ul>
                    </div>
                </section>
            </div>
        </nav>
        <!-- Navbar -->
        <section class="content-wrapper">
            <aside class="sidebar" id="sidebar">
                <header class="head-sidebar">
                    <button class="btn-sidebar" id="toggleSidebar">
                        <i class="las la-exchange-alt"></i>
                    </button>
                    <div class="name-logo">
                        <span class="fw-semibold text-muted">Navegación</span>
                    </div>
                </header>
                <p class="title-sidebar">Menú</p>
                <ul class="lisst menu">
                    <li>
                        <a href="<?= base_url('/home') ?>">
                            <i class="las la-home icon"></i>
                            <span class="text-item">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/') ?>">
                            <i class="las la-user-plus icon"></i>
                            <span class="text-item">Nuevo Usuario</span>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- Navbar -->
            <section class="content-inner container-fluid">
                <!-- CONTENIDO -->
                <?= $this->renderSection("contenido"); ?>

                <!-- CONTENIDO -->

                <!-- Footer de pagina -->
                <footer class="footer">
                    &copy; Desarrollado por <a href="" class="nav-link d-inline">Grupo No. ?</a> 2024
                </footer>
                <!-- Footer de pagina -->
            </section>
        </section>
    </main>
    <!-- Contenedor general -->

    <script src="<?= base_url('js/bootstrap.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.js"></script>
    <script src="<?= base_url('/js/main.js') ?>"></script>
    <?= $this->renderSection("scripts"); ?>
</body>

</html>