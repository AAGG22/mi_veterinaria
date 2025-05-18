<!-- eliminar relacion amo-mascota -->
<?= view('layouts/header') ?>
<?= view('layouts/menu') ?>
<?php helper('form'); ?>

<div class="col vw-100">
    <!-- nav -->
    <ul class="nav nav-underline mt-3 ms-3">
        <li class="nav-item me-2">
            <a class="nav-link active" aria-current="page" href="<?= base_url('eliminar/rel') ?>">Eliminar relación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-green" href="<?= base_url('eliminar/vet') ?>">Eliminar veterinario</a>
        </li>
    </ul>
    
    <div class="row d-flex justify-content-center align-items-center ajust-height">
        <div class="col-8 rounded border border-secondary-subtle w-50 p-4">

            <?php echo form_open('form/baja_rel', ['id' => 'form_baja_rel']); ?>
                        
                <div class="p-3">
                    <h5 class="text-center w-100">Dar de baja relacion entre amo y mascota</h5>
                    <span class="form-label pt-2">Ingrese el documento del amo para cargar sus mascotas:</span>
                    <?php
                    echo form_dropdown('selectowner', $amos, $amoSeleccionado ?? old('selectowner'), [
                        'id'    => 'selectowner',
                        'class' => 'form-select',
                        'onchange' => "window.location.href = '".base_url('cargarm/eliminar/rel')."?selectowner=' + this.value"
                    ]);
                    if (session('errors.selectowner')): ?>
                        <div class="text-error"><?= session('errors.selectowner') ?></div>
                    <?php endif; ?>
                    <?php if (!isset($mascotas)) {
                        $mascotas = ['' => 'Numero de registro'];
                    } ?>

                    <hr class="my-4">
                    <?php
                    echo form_dropdown('selectpet', $mascotas, old('selectpet'), [
                        'id'    => 'selectpet',
                        'class' => 'form-select'
                    ]);
                    if (session('errors.selectpet')):?>
                        <div class="text-error"><?= session('errors.selectpet') ?></div>
                    <?php endif; ?>
                </div>

                <div class="row px-3">
                    <div class="col pt-2">
                        <span class="form-label">Causa de la baja</span> <br>

                        <?php  echo form_input([
                            'type' => 'radio',
                            'name' => 'causa',
                            'class' => 'btn-check',
                            'id' => 'v',
                            'value' => '0',
                            'autocomplete' => 'off',
                            'checked'     => (old('causa') === '0' || old('causa') === null)
                        ]);
                        echo form_label('Venta', 'v', ['class' => 'btn']); ?>

                        <?php  echo form_input([
                            'type' => 'radio',
                            'name' => 'causa',
                            'class' => 'btn-check',
                            'id' => 'f',
                            'value' => '-1',
                            'autocomplete' => 'off',
                            'checked'     => (old('causa') === '-1' || old('causa') === null)
                        ]);
                        echo form_label('Fallecimiento', 'f', ['class' => 'btn']); ?>
                    </div>
                    <div class="col pt-2">

                        <span class="form-label">Fecha</span>
                        <?php echo form_input(array(
                                'name' => 'fbaja', 
                                'class' => 'form-control',
                                'type' => 'date',
                                'value' => old('fbaja')
                            ));
                            if (session('errors.fbaja')){   ?>
                                <div class="text-error"><?= session('errors.fbaja') ?></div>
                            <?php } ?>
                        
                    </div>
                </div>

                <div class="w-100 d-flex justify-content-center pt-3">
                    <button class="w-25 btn btn-green" onclick="document.getElementById('form_baja_rel').submit();">
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