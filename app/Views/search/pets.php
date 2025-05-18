<!-- Mostrar mascotas a partir de un dueño -->
<?= view('layouts/header') ?>
<?= view('layouts/menu') ?>
<?php helper('form'); ?>

<div class="col vw-100">
    <!-- nav -->
    <ul class="nav nav-underline mt-3 ms-3">
        <li class="nav-item me-2">
            <a class="nav-link active" aria-current="page" href="#">Buscar mascotas de un amo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-green" href="<?= base_url('search/owners') ?>">Buscar amos de una mascota</a>
        </li>
    </ul>
    
    <div class="w-100 p-4">
        
        <div class="py-4">
            <?php echo form_open('form/searchpets', ['id' => 'form_searchpets']); ?>
                <span class="form-label me-3">Ingrese un amo y se cargaran sus mascotas:</span>
                <?php echo form_dropdown('selectowner', $amos, $idAmo ?? '', [
                    'name'    => 'selectowner',
                    'id'    => 'selectowner',
                    'class' => 'form-select w-25',
                    'onchange' => "document.getElementById('form_searchpets').submit();"
                ]);
            echo form_close(); ?>
        </div>

        <div class="py-2">
            <span class="form-label">Resultados</span>
            <hr class="m-0 mt-2">

            <!-- Listado de mascotas -->
            <?= view('search/loadpets.php') ?>
            <?= view('search/loadpets-v.php') ?>
            <?= view('search/loadpets-f.php') ?>
            
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
  });
</script>

<?= view('layouts/footer') ?>
