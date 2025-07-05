    <?= $this->include('header') ?>
    <div class="container mt-4">
        <h2>📊 Inicio</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Casos Clínicos</div>
                    <div class="card-body">
                        <h3 class="card-title"><?= $totalCasos ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <h3>📝 Últimos Casos Clínicos</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre y Apellido</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ultimosCasos as $caso): ?>
                    <tr>
                        <td><?= $caso->paciente?></td>
                        <td><?= $caso->motivo_consulta ?></td>
                        <td><?= $caso->fecha_registro ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-4" style="margin-bottom: .8em;">
            <a href="<?= base_url() ?>/" class="btn btn-danger btn-lg">Cerrar sesión</a>
        </div>
    </div>

    <?= $this->include('footer') ?>