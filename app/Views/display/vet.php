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
                        <?= $vet['vetNomApe'] ?>
                    </span>
                </div>
                <div class="row mt-2">
                    <div class="row">
                        <span><span class="txt">Especialidad: </span><?= $vet['vetEspec'] ?></span>
                    </div>
                    <div class="row">
                        <span><span class="txt">Telefono: </span><?= $vet['vetTel'] ?></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <span><span>Fecha de ingreso: </span><?= $vet['vetIngreso'] ?></span>

                    <?php if ($vet['vetEgreso'] != '') {  ?>
                        <span class="fw-semibold dark-green">Fecha de egreso: <?= $vet['vetEgreso'] ?></span>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-end mt-1">
                    <button class="btn btn-green" data-bs-toggle="modal" data-bs-target="#modalEditVet<?= $vet['id'] ?>" style="font-weight:500;">
                        Editar
                    </button>
                </div>

            </div>
        </div>
    </div>

    <?= view('edit/vet.php', $vet) ?>

</div>


<?= view('layouts/footer') ?>