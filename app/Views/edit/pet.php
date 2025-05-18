<!-- ##### modal para editar una mascota ##### -->

<div class="modal fade" id="modalEditPet<?= $nro_reg ?>" tabindex="-1" aria-labelledby="editPetLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php $errors = session('errors'); ?>

            <div class="modal-header border-0 pb-1">
                <h1 class="modal-title fs-5" id="editPetLabel">Editar mascota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $error = session('error'); ?>

                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <?= form_open('/form/editar_mascota/' . $nro_reg) ?>

                        <?= form_hidden('edadSaved', $petEdad) ?>

                        <div class="row mb-2">
                            <?= form_label(
                                'Nombre',
                                'petNombreEdit',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'petNombreEdit',
                                'value' => $petNombre,
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.petNombreEdit')) {   ?>
                                <div><small class="text-danger"><?= session('errors.petNombreEdit') ?></small></div>
                            <?php } ?>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-sm-6 px-0 ps-sm-0 pe-sm-3">
                                <?= form_label(
                                    'Especie',
                                    'petEspecieEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'petEspecieEdit',
                                    'value' => $petEspecie,
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.petEspecieEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.petEspecieEdit') ?></small></div>
                                <?php } ?>
                            </div>

                            <div class="col-12 col-sm-6 px-0">
                                <?= form_label(
                                    'Raza',
                                    'petRazaEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'petRazaEdit',
                                    'value' => $petRaza,
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.petRazaEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.petRazaEdit') ?></small></div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row">
                            <?= form_label(
                                'Edad',
                                'petEdadEdit',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>

                            <div class="col-12 col-sm-4 px-0 mb-2">
                                <div class="row mx-0">
                                    <div class="col-3 col-sm-6 p-0">
                                        <?= form_input(array(
                                            'name' => 'petAniosEdit',
                                            'class' => 'form-control',
                                        )); ?>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <?= form_label(
                                            'años',
                                            'petAniosEdit',
                                            array('class' => 'col-form-label ps-0')
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 px-0 mb-2">
                                <div class="row mx-0">
                                    <div class="col-3 col-sm-6 p-0">
                                        <?= form_input(array(
                                            'name' => 'petMesesEdit',
                                            'class' => 'form-control',
                                        )); ?>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <?= form_label(
                                            'meses',
                                            'petMesesEdit',
                                            array('class' => 'col-form-label ps-0')
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 px-0 mb-2">
                                <div class="row mx-0">
                                    <div class="col-3 col-sm-6 p-0">
                                        <?= form_input(array(
                                            'name' => 'petDiasEdit',
                                            'class' => 'form-control',
                                        )); ?>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <?= form_label(
                                            'dias',
                                            'petDiasEdit',
                                            array('class' => 'col-form-label ps-0')
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div id="collabHelp" class="form-text text-decoration-underline mt-1">
                                Última edad registrada: <?= $petEdad ?>
                            </div>

                            <?php if (session('errors.petAniosEdit')) {   ?>
                                <div><small class="text-danger"><?= session('errors.petAniosEdit') ?></small></div>
                            <?php } ?>
                            <?php if (session('errors.petMesesEdit')) {   ?>
                                <div><small class="text-danger"><?= session('errors.petMesesEdit') ?></small></div>
                            <?php } ?>
                            <?php if (session('errors.petDiasEdit')) {   ?>
                                <div><small class="text-danger"><?= session('errors.petDiasEdit') ?></small></div>
                            <?php } ?>
                            <?php if (isset($errors['petAnioLimite'])) {   ?>
                                <div><small class="text-danger"><?= $errors['petAnioLimite'] ?></small></div>
                            <?php } ?>
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
