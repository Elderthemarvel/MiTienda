<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<h1>Tipos</h1>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<a href="<?= base_url('crear_tipo') ?>" class="btn btn-primary mb-3" title="Crear Tipo">Asignar nuevo tipo</a>
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
        <?php if (!empty($data) && is_array($data)) : ?>
            <?php foreach ($data as $tipo) : ?>
                <tr>                    
                    <td><?php echo($tipo['id']); ?></td>
                    <td><?php echo($tipo['nom_tipo']); ?></td>
                    <td><?php echo($tipo['created_at']); ?></td>
                    <td><a href="<?= base_url('editar/' . $tipo['id']) ?>" class="btn btn-warning btn-sm" title="Modificar tipo"><i class="bi bi-pencil"></i></a></td>
                    <td><a href="<?= base_url('eliminar/' . $tipo['id']) ?>" class="btn btn-danger btn-sm" title="Eliminar tipo"><i class="bi bi-trash"></i></a></td>
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
