<!-- crear vista mascota -->
<?= view('layouts/header') ?>
<?= view('layouts/menu') ?>
<?php helper('form'); ?>

<div class="col vw-100">
    <div class="row d-flex justify-content-start">
        <div class="col-1 mt-4 ms-4">
            <span style="font-size: 20px;">
                <a href="<?=base_url('/')?>">
                    <!-- <i class="bi bi-arrow-left dark-green"></i> -->
                </a>
            </span>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center ajust-height">

        <div class="col-8 rounded w-50 b-solo green">
            <div class="px-2 pt-3 pb-2">

                <div class="row">
                    <span class="fs-5 fw-semibold dark">
                        <?= $pet['petNombre'] ?>
                        <span class="fs-6 dark-green ps-2">#<?= $pet['nro_reg'] ?></span>
                    </span>
                </div>
                <div class="row mt-2">
                    <div class="row">
                        <span><span class="txt">Edad: </span><?= $pet['petEdad'] ?></span>
                    </div>
                    <div class="row">
                        <span><span class="txt">Especie: </span><?= $pet['petEspecie'] ?></span>
                    </div>
                    <div class="row">
                        <span><span class="txt">Raza: </span><?= $pet['petRaza'] ?></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <span><span>Fecha de alta: </span><?= $pet['petFechaA'] ?></span>

                    <?php if ($pet['petFechaF'] != '') {  ?>
                        <span class="fw-semibold dark-green">Fecha fallecimiento: <?= $pet['petFechaF'] ?></span>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-end mt-1">
                    <button class="btn btn-green" data-bs-toggle="modal" data-bs-target="#modalEditPet<?= $pet['nro_reg'] ?>" style="font-weight:500;">
                        Editar
                    </button>
                </div>

            </div>
        </div>
    </div>

    <?= view('edit/pet.php', $pet) ?>

</div>


<?= view('layouts/footer') ?>