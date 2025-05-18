<!-- modal para cargar una mascota -->
<?php $errors = session('errors'); ?>

<div class="modal fade" id="modalCreatePet" tabindex="-1" aria-labelledby="createPetLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-1">
                <h1 class="modal-title fs-5" id="createPetLabel">Cargar mascota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $error = session('error'); ?>

                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <?= form_open('/form/crear_mascota') ?>
                        <div class="row mb-2">
                            <?= form_label(
                                'Nombre',
                                'petNombre',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'petNombre',
                                'value' => old('petNombre'),
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.petNombre')) {   ?>
                                <div><small class="text-danger"><?= session('errors.petNombre') ?></small></div>
                            <?php } ?>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-sm-6 px-0 ps-sm-0 pe-sm-3">
                                <?= form_label(
                                    'Especie',
                                    'petEspecie',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'petEspecie',
                                    'value' => old('petEspecie'),
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.petEspecie')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.petEspecie') ?></small></div>
                                <?php } ?>
                            </div>

                            <div class="col-12 col-sm-6 px-0">
                                <?= form_label(
                                    'Raza',
                                    'petRaza',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'petRaza',
                                    'value' => old('petRaza'),
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.petRaza')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.petRaza') ?></small></div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row">
                            <?= form_label(
                                'Edad',
                                'petEdad',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>

                            <div class="col-12 col-sm-4 px-0 mb-2">
                                <div class="row mx-0">
                                    <div class="col-3 col-sm-6 p-0">
                                        <?= form_input(array(
                                            'name' => 'petAnios',
                                            'value' => old('petAnios'),
                                            'class' => 'form-control',
                                        )); ?>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <?= form_label(
                                            'años',
                                            'petAnios',
                                            array('class' => 'col-form-label ps-0')
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 px-0 mb-2">
                                <div class="row mx-0">
                                    <div class="col-3 col-sm-6 p-0">
                                        <?= form_input(array(
                                            'name' => 'petMeses',
                                            'value' => old('petMeses'),
                                            'class' => 'form-control',
                                        )); ?>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <?= form_label(
                                            'meses',
                                            'petMeses',
                                            array('class' => 'col-form-label ps-0')
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 px-0 mb-2">
                                <div class="row mx-0">
                                    <div class="col-3 col-sm-6 p-0">
                                        <?= form_input(array(
                                            'name' => 'petDias',
                                            'value' => old('petDias'),
                                            'class' => 'form-control',
                                        )); ?>
                                    </div>
                                    <div class="col-6 ps-2">
                                        <?= form_label(
                                            'dias',
                                            'petDias',
                                            array('class' => 'col-form-label ps-0')
                                        ); ?>
                                    </div>
                                </div>
                            </div>

                            <?php if (session('errors.petAnios')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.petAnios') ?></small></div>
                            <?php } ?>
                            <?php if (session('errors.petMeses')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.petMeses') ?></small></div>
                            <?php } ?>
                            <?php if (session('errors.petDias')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.petDias') ?></small></div>
                            <?php } ?>
                            <?php if (isset($errors['petEdad'])) {   ?>
                                <div><small class="text-danger"><?= $errors['petEdad'] ?></small></div>
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
                <?= form_submit('Submit', 'Cargar', ['class' => 'btn btn-green']) ?>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>