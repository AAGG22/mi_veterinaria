<!-- modal para cargar un amo -->
<div class="modal fade" id="modalCreateOwner" tabindex="-1" aria-labelledby="createOwnerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-1">
                <h1 class="modal-title fs-5" id="createOwnerLabel">Cargar amo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <?= form_open('/form/crear_amo') ?>
                        <div class="row mb-2">
                            <?= form_label(
                                'Nombre y Apellido',
                                'ownerNomApe',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'ownerNomApe',
                                'value' => old('ownerNomApe'),
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.ownerNomApe')) {   ?>
                                <div class="ps-0"><small class="text-danger"><?= session('errors.ownerNomApe') ?></small></div>
                            <?php } ?>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-sm-6 px-0 ps-sm-0 pe-sm-3">
                                <?= form_label(
                                    'DNI',
                                    'ownerDni',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'ownerDni',
                                    'value' => old('ownerDni'),
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.ownerDni')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.ownerDni') ?></small></div>
                                <?php } ?>
                                <div id="collabHelp" class="form-text mt-1">Ingresar sin puntos ni espacios</div>
                            </div>

                            <div class="col-12 col-sm-6 px-0">
                                <?= form_label(
                                    'Teléfono',
                                    'ownerTel',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'ownerTel',
                                    'value' => old('ownerTel'),
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.ownerTel')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.ownerTel') ?></small></div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <?= form_label(
                                'Dirección',
                                'ownerDire',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'ownerDire',
                                'value' => old('ownerDire'),
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.ownerDire')) {   ?>
                                <div class="ps-0"><small class="text-danger"><?= session('errors.ownerDire') ?></small></div>
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