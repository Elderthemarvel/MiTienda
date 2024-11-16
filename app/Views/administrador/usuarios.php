<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>

<div class="card">
    <div class="card-header d-flex flex-grap justify-content-between">
        <h1>Usuarios</h1>
        <a href="<?= base_url('nuevo_user') ?>" class="btn btn-primary mb-3" title="Crear Usuario">Asignar nuevo usuario</a>

    </div>
    <div class="card-body overflow-auto">
        <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
        <?php endif; ?>
        <div class="table-responsive">
        <table class="table table-dastriped table-hover display" id="usuarios">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Id Tipo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Género</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Modificar Contraseña</th>
                        <th>Fecha de Creación</th>
                        <th>Modificar Usuario</th>
                        <th>Eliminar </th>
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
                            <td class="text-center"><a href="<?= base_url('modificar_pass/' . $registro['id']) ?>" class="btn btn-success btn-sm" title="Modificar contraseña"><i class="bi bi-key"></i></a></td>
                            <td><?php echo $registro['created_at']; ?></td>
                            <td class="text-center"><a href="<?= base_url('modificar_usuario/' . $registro['id']) ?>" class="btn btn-warning btn-sm" title="Modificar usuario"><i class="bi bi-pencil"></i></a></td>
                            <td class="text-center"><a href="<?= base_url('eliminar_user/' . $registro['id']) ?>" class="btn btn-danger" title="Eliminar usuario"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" class="text-center">No hay usuarios registrados</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>






<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready( function () {
        $('#usuarios').DataTable();
    } );
</script>
<?= $this->endSection() ?>