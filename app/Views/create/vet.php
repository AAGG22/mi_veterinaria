<!-- cargar veterinario -->
<?= view('layouts/header') ?>
<?= view('layouts/menu') ?>
<?php helper('form'); ?>

<div class="col vw-100">
    <!-- nav -->
    <ul class="nav nav-underline mt-3 ms-3">
        <li class="nav-item me-2">
            <a class="nav-link nav-link-green" aria-current="page" href="<?= base_url('cargar/rel') ?>">Cargar relación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('cargar/vet') ?>">Cargar veterinario</a>
        </li>
    </ul>

    <div class="row d-flex justify-content-center align-items-center ajust-height">
        <div class="col-8 rounded border border-secondary-subtle w-50">

            <?php echo form_open('form/crear_vet', ['id' => 'form_crear_vet']); ?>
                <div class="row p-4">
                    <div class="p-0 m-0 d-flex justify-content-center">
                        <img src="<?= base_url('img/veterinario.png') ?>" width="50">
                    </div>
                    <h5 class="text-center w-100">Cargar veterinario</h5>

                    <?php echo form_input(array(
                        'name' => 'nomape', 
                        'class' => 'form-control w-100 mt-3',
                        'type' => 'text',
                        'placeholder' => 'Nombre y apellido',
                        'value' => old('nomape')
                    ));
                    if (session('errors.nomape')){   ?>
                        <div class="text-error"><?= session('errors.nomape') ?></div>
                    <?php } ?>
                    <div class="col p-0 pe-2">
                        <?php echo form_input(array(
                            'name' => 'espec', 
                            'class' => 'form-control w-100 mt-3',
                            'type' => 'text',
                            'placeholder' => 'Especialidad',
                            'value' => old('espec')
                        ));
                        if (session('errors.espec')){   ?>
                            <div class="text-error"><?= session('errors.espec') ?></div>
                        <?php } ?>
                    </div>
                    <div class="col p-0 ps-2">
                        <?php echo form_input(array(
                            'name' => 'tel', 
                            'class' => 'form-control w-100 mt-3',
                            'type' => 'tel',
                            'placeholder' => 'Telefono',
                            'value' => old('tel')
                        ));
                        if (session('errors.tel')){   ?>
                            <div class="text-error"><?= session('errors.tel') ?></div>
                        <?php } ?>
                    </div>
                    <span class="mt-3 opacity-75">Fecha de ingreso</span>
                    <?php echo form_input(array(
                            'name' => 'fingreso', 
                            'class' => 'form-control w-50',
                            'type' => 'date',
                            'placeholder' => 'Telefono',
                            'value' => old('fingreso')
                        ));
                        if (session('errors.fingreso')){   ?>
                            <div class="text-error"><?= session('errors.fingreso') ?></div>
                        <?php } ?>
                    
                    <div class="w-100 d-flex justify-content-center">
                        <button class="w-25 btn btn-green mt-3">
                            Cargar
                        </button>
                    </div>

                </div>
            <?php echo form_close(); ?>

        </div>
    </div>

</div>

<?= view('layouts/footer') ?>