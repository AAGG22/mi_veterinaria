<!-- Contenido: Mostrar -->
<div class="col vw-100 p-3">
    <div class="container-fluid">
        <div class="row">
            <!-- Filtro Lateral -->
            <div class="col-md-3 p-3">
                <div class="card">
                    <div class="card-header">Filtros</div>
                    <div class="card-body">
                        <form method="get" action="<?= base_url('mostrar') ?>">
                            <div class="mb-3">
                                <label for="filtro" class="form-label">Seleccionar:</label>
                                <select name="filtro" id="filtro" class="form-select" onchange="this.form.submit()">
                                    <option value="mascotas" <?= $filtro === 'mascotas' ? 'selected' : '' ?>>Mascotas</option>
                                    <option value="amos" <?= $filtro === 'amos' ? 'selected' : '' ?>>Amos</option>
                                    <option value="veterinarios" <?= $filtro === 'veterinarios' ? 'selected' : '' ?>>Veterinarios</option>
                                    <!-- parte comentada -->
                                </select>
                            </div>

                            <?php if ($filtro === 'mascota_por_amo'): ?>
                                <div class="mb-3">
                                    <label for="id_amo" class="form-label">Seleccionar Amo:</label>
                                    <select name="id_amo" id="id_amo" class="form-select" onchange="this.form.submit()">
                                        <option value="">-- Seleccionar --</option>
                                        <?php foreach ($amos as $amo): ?>
                                            <option value="<?= esc($amo['id']) ?>" <?= $id_amo == $amo['id'] ? 'selected' : '' ?>>
                                                <?= esc($amo['id']) . ' - ' . esc($amo['nom_ape']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php elseif ($filtro === 'amo_por_mascota'): ?>
                                <div class="mb-3">
                                    <label for="id_mascota" class="form-label">Seleccionar Mascota:</label>
                                    <select name="id_mascota" id="id_mascota" class="form-select" onchange="this.form.submit()">
                                        <option value="">-- Seleccionar --</option>
                                        <?php foreach ($mascotas as $mascota): ?>
                                            <option value="<?= esc($mascota['nro_registro']) ?>" <?= $id_mascota == $mascota['nro_registro'] ? 'selected' : '' ?>>
                                                <?= esc($mascota['nro_registro']) . ' - ' . esc($mascota['nombre']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Listado -->
            <div class="col-md-9 p-3">
                <div class="card">
                    <div class="card-header">
                        <?php
                        $titulos = [
                            'mascotas' => 'Listado de Mascotas',
                            'amos' => 'Listado de Amos',
                            'veterinarios' => 'Listado de Veterinarios',
                            'mascota_por_amo' => 'Mascotas del Amo',
                            'amo_por_mascota' => 'Amo de la Mascota'
                        ];
                        echo esc($titulos[$filtro]);
                        ?>
                    </div>
                    <div class="card-body">
                        <?php if ($filtro === 'mascotas'): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nro. Registro</th>
                                        <th>Nombre</th>
                                        <th>Especie</th>
                                        <th>Raza</th>
                                        <th>Edad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mascotas as $mascota): ?>
                                        
                                        <tr>
                                            <td>
                                            <a href="<?= base_url('/ver/mascota/'.$mascota['nro_registro']) ?>" class="card-text">
                                                <?= esc($mascota['nro_registro']) ?>
                                            </a>
                                            </td>
                                            <td><?= esc($mascota['nombre']) ?></td>
                                            <td><?= esc($mascota['especie']) ?></td>
                                            <td><?= esc($mascota['raza']) ?></td>
                                            <td><?= esc($mascota['edad']) ?></td>
                                        </tr>
                                        
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php elseif ($filtro === 'amos'): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Fecha Alta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($amos as $amo): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('/ver/amo/'.$amo['id']) ?>" class="card-text">
                                                    <?= esc($amo['id']) ?>
                                                </a>
                                            </td>
                                            <td><?= esc($amo['nom_ape']) ?></td>
                                            <td><?= esc($amo['direccion']) ?></td>
                                            <td><?= esc($amo['telefono']) ?></td>
                                            <td><?= esc($amo['f_alta']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php elseif ($filtro === 'veterinarios'): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Especialidad</th>
                                        <th>Teléfono</th>
                                        <th>Fecha Ingreso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($veterinarios as $vet): ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('/ver/vet/'.$vet['id']) ?>" class="card-text">
                                                    <?= esc($vet['id']) ?>
                                                </a>
                                            </td>
                                            <td><?= esc($vet['nom_ape']) ?></td>
                                            <td><?= esc($vet['especialidad']) ?></td>
                                            <td><?= esc($vet['telefono']) ?></td>
                                            <td><?= esc($vet['f_ingreso']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php elseif ($filtro === 'mascota_por_amo'): ?>
                            <?php if ($id_amo && !empty($mascotas)): ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nro. Registro</th>
                                            <th>Nombre</th>
                                            <th>Especie</th>
                                            <th>Raza</th>
                                            <th>Edad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($mascotas as $mascota): ?>
                                            <tr>
                                                <td><?= esc($mascota['nro_registro']) ?></td>
                                                <td><?= esc($mascota['nombre']) ?></td>
                                                <td><?= esc($mascota['especie']) ?></td>
                                                <td><?= esc($mascota['raza']) ?></td>
                                                <td><?= esc($mascota['edad']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>Seleccione un amo para ver sus mascotas.</p>
                            <?php endif; ?>
                        <?php elseif ($filtro === 'amo_por_mascota'): ?>
                            <?php if ($id_mascota && !empty($amos)): ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>DNI</th>
                                            <th>Nombre</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Fecha Alta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($amos as $amo): ?>
                                            <tr>
                                                <td><?= esc($amo['id']) ?></td>
                                                <td><?= esc($amo['nom_ape']) ?></td>
                                                <td><?= esc($amo['direccion']) ?></td>
                                                <td><?= esc($amo['telefono']) ?></td>
                                                <td><?= esc($amo['f_alta']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>Seleccione una mascota para ver su amo.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <?php 
    var_dump($filtro); // Ver qué valor tiene realmente
    var_dump($mascotas); // Ver si hay datos
    var_dump($veterinarios); // Ver si hay datos
    ?>
<?= view('toast') ?>