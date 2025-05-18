<?php if (!isset($mascotasF)) {
    $mascotasF = [];
} ?>
<?php foreach ($mascotasF as $masc): ?>
<div class="w-100 py-2 opacity-75">
    <div class="row ps-2">
        <div class="col-10">
            <div class="card-text pb-1">
                <?= $masc['nombre']; ?> <span class="card-f">- fallecido</span>
            </div>
            <div class="subtext">
                Nº registro: <?= $masc['nreg']; ?>
            </div>
        </div>
        <div class="col d-flex justify-content-end align-items-center me-2">
            <a href="<?= base_url('/ver/mascota/'.$masc['nreg']) ?>" class="card-text fs-4"><i class="fa-regular fa-circle-right"></i></a>
        </div>
    </div>
</div> 
<hr class="m-0">
<?php endforeach; ?>