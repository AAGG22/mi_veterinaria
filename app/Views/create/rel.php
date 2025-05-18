<!-- crear relacion amo-mascota -->
<?= view('layouts/header') ?>
<?= view('layouts/menu') ?>
<?php helper('form'); ?>

<div class="col vw-100">
    <!-- nav -->
    <ul class="nav nav-underline mt-3 ms-3">
        <li class="nav-item me-2">
            <a class="nav-link active" aria-current="page" href="<?= base_url('cargar/rel') ?>">Cargar relación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-green" href="<?= base_url('cargar/vet') ?>">Cargar veterinario</a>
        </li>
    </ul>
    
    <div class="row d-flex justify-content-center align-items-center ajust-height">
        
        <div class="col-8 rounded border border-secondary-subtle w-50">

            <?php echo form_open('form/crear_rel', ['id' => 'form_crear_rel']); ?>
                <div class="row p-4">
                    <div class="p-0 m-0 d-flex justify-content-center">
                        <img src="<?= base_url('img/relacion.png') ?>" width="50">
                    </div>
                    
                    <h5 class="text-center w-100">Cargar relacion entre amo y mascota</h5>
                        
                    <div class="col p-3">
                        <?php
                        echo form_label('Documento del amo:', 'selectowner', [
                            'class' => 'form-label'
                        ]); 
                        echo form_dropdown('selectowner', $amos, old('selectowner'), [
                            'id'    => 'selectowner',
                            'class' => 'form-select'
                        ]);
                        ?>

                        <div class="d-flex justify-content-end mt-1">
                            <a href="#modalCreateOwner" class="a-green" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus me-1"></i> Añadir nuevo
                            </a>
                        </div>

                        <?php if (session('errors.selectowner')): ?>
                            <div class="text-error"><?= session('errors.selectowner') ?></div>
                        <?php endif; ?>

                    </div>
                    <div class="col p-3">
                        <?php
                        echo form_label('Nº registro de la mascota:', 'selectpet', [
                            'class' => 'form-label'
                        ]); 
                        echo form_dropdown('selectpet', $mascotas, old('selectpet'), [
                            'id'    => 'selectpet',
                            'class' => 'form-select'
                        ]);
                        ?>

                        <div class="d-flex justify-content-end mt-1">
                            <a href="#modalCreatePet" class="a-green" data-bs-toggle="modal">
                                <i class="fa-solid fa-plus me-1"></i> Añadir nuevo
                            </a>
                        </div>

                        <?php if (session('errors.selectpet')):?>
                            <div class="text-error"><?= session('errors.selectpet') ?></div>
                        <?php endif; ?>
                        
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                        <button class="w-25 btn btn-green" onclick="document.getElementById('form_crear_rel').submit();">
                            Cargar
                        </button>
                    </div>
                
                </div>

            <?php echo form_close(); ?>

        </div>
    </div>

    <?= view('create/modal_owner.php') ?>
    <?= view('create/modal_pet.php') ?>
    
</div>

<!-- SCRIPTS JQUERY Y SELECT2 -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#selectowner').select2({
      placeholder: "DNI",
      allowClear: true
    });

    $('#selectpet').select2({
      placeholder: "Numero de Registro",
      allowClear: true
    });
  });
</script>

<?= view('layouts/footer') ?>