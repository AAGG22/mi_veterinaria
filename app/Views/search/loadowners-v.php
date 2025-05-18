<?php if (!isset($amosV)) {
    $amosV = [];
} ?>
<?php foreach ($amosV as $amo): ?>
<div class="w-100 py-2 opacity-75">
    <div class="row ps-2">
        <div class="col-10">
            <div class="card-text pb-1">
                <?= $amo['nombre']; ?> <span class="card-v">- antigüo amo</span> 
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