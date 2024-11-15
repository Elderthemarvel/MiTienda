<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>

    <h1>Registro de Categorías</h1>

    <!-- Mensaje de éxito o error -->
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="mt-5">
        <h3>Categorías Existentes</h3>
        <table class="table table-striped" id="categoryTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($datosCategoria) && is_array($datosCategoria)) : ?>
                <?php foreach ($datosCategoria as $registro) : ?>
                    <tr>
                        <td><?= $registro['id']; ?></td>
                        <td><?= $registro['nom_categoria']; ?></td>
                        <td>
                            <!-- Enlace para editar categoría -->
                            <a href="<?= base_url('categoria/editar/' . $registro['id']); ?>" class="btn btn-primary btn-sm">Editar</a>
                            
                            <!-- Enlace para eliminar categoría -->
                            <a href="<?= base_url('categoria/eliminar/' . $registro['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">No hay categorías registradas</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

        <!-- Formulario para agregar una nueva categoría -->
        <h3>Agregar Nueva Categoría</h3>
        <form action="<?= base_url('categoria/guardar'); ?>" method="post">
            <div class="form-group">
                <label for="nombreCategoria">Nombre de la Categoría</label>
                <input type="text" name="nom_categoria" id="nombreCategoria" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Guardar Categoría</button>
        </form>
    </div>

<?= $this->endSection() ?>
