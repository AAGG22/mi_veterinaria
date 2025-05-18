<!-- crear vista dueño -->
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
                        <?= $owner['ownerNomApe'] ?>
                    </span>
                </div>
                <div class="row mt-2">
                    <div class="row">
                        <span><span class="txt">DNI: </span><?= $owner['dni'] ?></span>
                    </div>
                    <div class="row">
                        <span><span class="txt">Telefono: </span><?= $owner['ownerTel'] ?></span>
                    </div>
                    <div class="row">
                        <span><span class="txt">Direccion: </span><?= $owner['ownerDire'] ?></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <span><span>Fecha de alta: </span><?= $owner['ownerFechaA'] ?></span>
                </div>
                <div class="d-flex justify-content-end mt-1">
                    <button class="btn btn-green" data-bs-toggle="modal" data-bs-target="#modalEditOwner<?= $owner['dni'] ?>" style="font-weight:500;">
                        Editar
                    </button>
                </div>

            </div>
        </div>
    </div>

    <?= view('edit/owner.php', $owner) ?>

</div>


<?= view('layouts/footer') ?>