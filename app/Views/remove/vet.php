<!-- eliminar relacion amo-mascota -->
<?= view('layouts/header') ?>
<?= view('layouts/menu') ?>
<?php helper('form'); ?>

<div class="col vw-100">
    <!-- nav -->
    <ul class="nav nav-underline mt-3 ms-3">
        <li class="nav-item me-2">
            <a class="nav-link nav-link-green" aria-current="page" href="<?= base_url('eliminar/rel') ?>">Eliminar relación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('eliminar/vet') ?>">Eliminar veterinario</a>
        </li>
    </ul>
    
    <div class="row d-flex justify-content-center align-items-center ajust-height">
        <div class="col-8 rounded border border-secondary-subtle w-50 p-4">

            <?php echo form_open('form/baja_vet', ['id' => 'form_baja_vet']); ?>
                        
                <div class="p-3">

                    <h5 class="text-center w-100">Dar de baja veterinario</h5>
                    <div class="mb-3">
                        <?php echo form_dropdown('selectvet', $veterinarios, old('selectvet'), [
                            'id'    => 'selectvet',
                            'class' => 'form-select w-100'
                        ]);
                        if (session('errors.selectvet')): ?>
                            <div class="text-error"><?= session('errors.selectvet') ?></div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span class="form-label mt-3">Fecha de egreso</span>
                    <?php echo form_input(array(
                            'name' => 'fbaja', 
                            'class' => 'form-control w-50',
                            'type' => 'date',
                            'value' => old('fbaja')
                        ));
                        if (session('errors.fbaja')){   ?>
                            <div class="text-error"><?= session('errors.fbaja') ?></div>
                        <?php } ?>
                    </div>
                    
                </div>
                
                <div class="w-100 d-flex justify-content-center pt-3">
                    <button class="w-25 btn btn-green" onclick="document.getElementById('form_baja_vet').submit();">
                        Dar de baja
                    </button>
                </div>

            <?php echo form_close(); ?>

        </div>
    </div>
    
</div>

<!-- SCRIPTS JQUERY Y SELECT2 -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#selectvet').select2({
      placeholder: "Veterinario",
      allowClear: true
    });
  });
</script>

<?= view('layouts/footer') ?>