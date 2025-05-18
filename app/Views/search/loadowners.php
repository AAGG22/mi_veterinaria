<?php if (!isset($amosA)) {
    $amosA = [];
} ?>
<?php foreach ($amosA as $amo): ?>
<div class="w-100 py-2">
    <div class="row ps-2">
        <div class="col-10">
            <div class="card-text pb-1">
                <?= $amo['nombre']; ?>
            </div>
            <div class="subtext">
                DNI: <?= $amo['dni']; ?>
            </div>
        </div>
        <div class="col d-flex justify-content-end align-items-center me-2">
            <a href="<?= base_url('/ver/amo/'.$amo['dni']) ?>" class="card-text fs-4"><i class="fa-regular fa-circle-right"></i></a>
        </div>
    </div>
</div> 
<hr class="m-0">
<?php endforeach; ?>
