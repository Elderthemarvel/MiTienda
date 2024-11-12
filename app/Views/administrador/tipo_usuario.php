<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<h1>Tipos</h1>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<a href="<?= base_url('tipos/crear') ?>" class="btn btn-primary mb-3" title="Crear Tipo">Asignar nuevo tipo</a>
<table class="table table-striped table-hover pt-2" id="dataTable">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre del Tipo</th>
            <th>Creado el</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($datostipos) && is_array($datostipos)) : ?>
            <?php foreach ($datostipos as $tipo) : ?>
                <tr>
                    <td><?= esc($tipo['id']); ?></td>
                    <td><?= esc($tipo['nom_tipo']); ?></td>
                    <td><?= esc($tipo['created_at']); ?></td>
                    <td><a href="<?= base_url('tipos/editar/' . $tipo['id']) ?>" class="btn btn-warning btn-sm" title="Modificar tipo"><i class="bi bi-pencil"></i></a></td>
                    <td><a href="<?= base_url('tipos/eliminar/' . $tipo['id']) ?>" class="btn btn-danger btn-sm" title="Eliminar tipo"><i class="bi bi-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center">No hay tipos registrados</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
