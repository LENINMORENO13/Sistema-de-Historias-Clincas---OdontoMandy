    <?= $this->include('header') ?>
    <div class="container mt-4">
        <h2>📊 Inicio</h2>

        <div class="row">
            <!-- Total Pacientes -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Pacientes</div>
                    <div class="card-body">
                        <h3 class="card-title"><?= $totalPacientes ?></h3>
                    </div>
                </div>
            </div>
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
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Diagnóstico</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ultimosCasos as $caso): ?>
                    <tr>
                        <td><?= $caso->id_casos ?></td>
                        <td><?= $caso->cc_descripcion ?></td>
                        <td><?= $caso->cc_diagnostico ?></td>
                        <td><?= $caso->cc_fecha_consulta ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-4" style="margin-bottom: .8em;">
            <a href="<?= base_url()?>/" class="btn btn-danger btn-lg">Cerrar sesión</a>
        </div>
    </div>

    <?= $this->include('footer') ?>