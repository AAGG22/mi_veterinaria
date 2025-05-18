<!-- Navbar Menu -->
<nav class="navbar navbar-inverse navbar-fixed-top d-md-none">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <a class="navbar-brand" href="#"> -->
            <img src="<?=base_url('/img/placeholder.png')?>" height="35">
        <!-- </a> -->

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Mi Veterinaria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a href="<?= base_url('/') ?>" class="nav-link active" aria-current="page">
                            <i class="fa-solid fa-house me-2"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('mostrar') ?>" class="nav-link link-dark">
                            <i class="fa-solid fa-table-list me-2"></i> Mostrar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('search/pets') ?>" class="nav-link link-dark">
                            <i class="fa-solid fa-magnifying-glass me-2"></i> Buscar
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('cargar/rel') ?>" class="nav-link link-dark">
                            <i class="fa-solid fa-plus me-2"></i> 
                            Dar de alta
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('eliminar/rel') ?>" class="nav-link link-dark">
                            <i class="fa-solid fa-minus me-2"></i> 
                            Dar de baja
                        </a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

<!-- Body -->
<div class="row vw-100 overflow-hidden">
    <!-- Sidebar Menu -->
    <div class="col-lg-3 col-md-3 min-vh-100 h-auto p-0 d-none d-md-block menu-view">
        <div class="d-flex flex-column h-100 p-3"> <!-- style="width: 280px;" -->
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-3 fw-semibold ps-3 pe-2">Mi Veterinaria </span>
                        <img src="<?= base_url('img/veterinary.png') ?>" width="35">
        </a> 
        <hr>

            <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                    <a href="<?= base_url('/') ?>" class="nav-link link-dark" aria-current="page">
                        <i class="fa-solid fa-house me-2"></i> Inicio
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('mostrar') ?>" class="nav-link link-dark">
                     <i class="fa-solid fa-table-list me-2"></i> Mostrar
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('search/pets') ?>" class="nav-link link-dark">
                     <i class="fa-solid fa-magnifying-glass me-2"></i> Buscar
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('cargar/rel') ?>" class="nav-link link-dark">
                        <i class="fa-solid fa-plus me-2"></i> 
                        Dar de alta
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('eliminar/rel') ?>" class="nav-link link-dark">
                        <i class="fa-solid fa-minus me-2"></i> 
                        Dar de baja
                    </a>
                </li>
            </ul>
        </div>
    </div>