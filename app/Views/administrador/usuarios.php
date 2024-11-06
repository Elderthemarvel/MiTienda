<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<table class="table table-striped table-hover pt-2" id="dataTable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Id Tipo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Género</th>
            <th>Fecha de Nacimiento</th>
            <th>Creado el</th>
            <th>Actualizado el</th>
            <th>Eliminado el</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($datosusuario) && is_array($datosusuario)) : ?>
            <?php foreach ($datosusuario as $registro) : ?>
                <tr>
                    <td><?php echo $registro['id']; ?></td>
                    <td><?php echo $registro['id_tipo']; ?></td>
                    <td><?php echo $registro['nombre']; ?></td>
                    <td><?php echo $registro['apellido']; ?></td>
                    <td><?php echo $registro['correo']; ?></td>
                    <td><?php echo $registro['genero']; ?></td>
                    <td><?php echo $registro['fecha_nacimiento']; ?></td>
                    <td><?php echo $registro['created_at']; ?></td>
                    <td><?php echo $registro['updated_at']; ?></td>
                    <td><?php echo $registro['delete_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="11" class="text-center">No hay usuarios registrados</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>