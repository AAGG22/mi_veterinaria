<!--  modal para editar un amo  -->

<!-- MODIFICACION: ACCESO A LAS VARIABLES. DEPENDE DE COMO SE MANDE LA DATA AL MODAL (array o array de arrays)
    Y NOMBRE DE LAS VARIABLES (hay que cambiarlo en donde se levanta la data o cambiarlo **acá** y en **controlador**)
-->

<div class="modal fade" id="modalEditOwner<?= $dni ?>" tabindex="-1" aria-labelledby="editOwnerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-1">
                <h1 class="modal-title fs-5" id="editOwnerLabel">Editar amo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <?= form_open('/form/editar_amo/' . $dni) ?>

                        <div class="row mb-2">
                            <?= form_label(
                                'Nombre y Apellido',
                                'ownerNomApeEdit',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'ownerNomApeEdit',
                                'value' => $ownerNomApe,
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.ownerNomApeEdit')) {   ?>
                                <div class="ps-0"><small class="text-danger"><?= session('errors.ownerNomApeEdit') ?></small></div>
                            <?php } ?>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-sm-6 px-0 ps-sm-0 pe-sm-3">
                                <?= form_label(
                                    'DNI',
                                    'ownerDniEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'ownerDniEdit',
                                    'value' => $dni,
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.ownerDniEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.ownerDniEdit') ?></small></div>
                                <?php } ?>
                                <div id="dniHelp" class="form-text mt-1">Ingresar sin puntos ni espacios</div>
                            </div>

                            <div class="col-12 col-sm-6 px-0">
                                <?= form_label(
                                    'Teléfono',
                                    'ownerTelEdit',
                                    array('class' => 'form-label mb-1 ps-0')
                                ); ?>
                                <?= form_input(array(
                                    'name' => 'ownerTelEdit',
                                    'value' => $ownerTel,
                                    'class' => 'form-control',
                                )); ?>
                                <?php if (session('errors.ownerTelEdit')) {   ?>
                                    <div><small class="text-danger"><?= session('errors.ownerTelEdit') ?></small></div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <?= form_label(
                                'Dirección',
                                'ownerDireEdit',
                                array('class' => 'form-label mb-1 ps-0')
                            ); ?>
                            <?= form_input(array(
                                'name' => 'ownerDireEdit',
                                'value' => $ownerDire,
                                'class' => 'form-control',
                            )); ?>
                            <?php if (session('errors.ownerDireEdit')) {   ?>
                                <div class="ps-0"><small class="text-danger"><?= session('errors.ownerDireEdit') ?></small></div>
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