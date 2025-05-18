<!-- modal para editar un veterinario -->

<!-- MODIFICACION: ACCESO A LAS VARIABLES. DEPENDE DE COMO SE MANDE LA DATA AL MODAL (array o array de arrays)
    Y NOMBRE DE LAS VARIABLES (hay que cambiarlo en donde se levanta la data o cambiarlo **acá** y en **controlador**)
-->

<div class="modal fade" id="modalEditVet<?= $id ?>" tabindex="-1" aria-labelledby="editVetLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-1">
                <h1 class="modal-title fs-5" id="editVetLabel">Editar veterinario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <?= form_open('/form/editar_vet/' . $id) ?>

                        <div class="row mb-2">
                            <?= form_label(
                                'Nombre y Apellido',
                                'vetNomApeEdit',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'vetNomApeEdit',
                                'value' => $vetNomApe,
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.vetNomApeEdit')) {   ?>
                                <div class="ps-0"><small class="text-danger"><?= session('errors.vetNomApeEdit') ?></small></div>
                            <?php } ?>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-sm-6 px-0 ps-sm-0 pe-sm-3">
                                <?= form_label(
                                    'Especialidad',
                                    'vetEspecEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'vetEspecEdit',
                                    'value' => $vetEspec,
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.vetEspecEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.vetEspecEdit') ?></small></div>
                                <?php } ?>
                            </div>

                            <div class="col-12 col-sm-6 px-0">
                                <?= form_label(
                                    'Teléfono',
                                    'vetTelEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'vetTelEdit',
                                    'value' => $vetTel,
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.vetTelEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.vetTelEdit') ?></small></div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-sm-6 ps-0">
                                <?= form_label(
                                    'Fecha de ingreso',
                                    'vetIngresoEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'vetIngresoEdit',
                                    'value' => $vetIngreso,
                                    'type' => 'date',
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.vetIngresoEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.vetIngresoEdit') ?></small></div>
                                <?php } ?>
                            </div>

                            <div class="col-12 col-sm-6 ps-0">
                                <?php 
                                echo form_label(
                                    'Fecha de egreso',
                                    'vetEgresoEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                );

                                $attr = [ 'name' => 'vetEgresoEdit', 'value' => $vetEgreso, 'type' => 'date', 'class' => 'form-control',];

                                if ($vetEgreso == null) { $attr['disabled'] = 'disabled'; } //no permite editar una fecha inexistente
                                echo form_input($attr);
                                
                                if (session('errors.vetEgresoEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.vetEgresoEdit') ?></small></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer border-0 pt-1">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <?= form_submit('Submit', 'Actualizar', ['class' => 'btn btn-green']) ?>
                <?= form_close() ?>
            </div>

        </div>
    </div>
</div>