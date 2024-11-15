<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>

    <h1>Registro de categorias</h1>

    <form id="categoryForm" action="<?= base_url('/administrador/categoria') ?>" method="post">
            <div class="mb-3">
                <label for="categoryId" class="form-label">ID de Categoría</label>
                <input type="text" class="form-control" id="categoryId" placeholder="ID" disabled>
            </div>
            <div class="mb-3">
                <label for="categoryName" class="form-label">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="categoryName" placeholder="Nombre de la categoría" required>
            </div>
           
            <button type="button" class="btn btn-primary" onclick="createCategory()">Crear</button>
            <button type="button" class="btn btn-success" onclick="updateCategory()">Actualizar</button>
            <button type="button" class="btn btn-danger" onclick="deleteCategory()">Eliminar</button>
            <button type="button" class="btn btn-secondary" onclick="resetForm()">Limpiar</button>
        </form>

        <!-- Tabla para Mostrar Categorías -->
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
                <?php if (!empty($datoCategoria) && is_array($datosCategoria)) : ?>
                    <?php foreach ($datosCategoria as $registro) : ?>
                        <tr>
                            <td><?php echo $registro['id']; ?></td>
                            <td><?php echo $registro['nom_categoria']; ?></td>
                            <td class="text-center"><a href="<?= base_url('modificar_pass/' . $registro['id']) ?>" class="btn btn-success btn-sm" title="Modificar contraseña"><i class="bi bi-key"></i></a></td>
                            <td><?php echo $registro['created_at']; ?></td>
                            <td class="text-center"><a href="<?= base_url('modificar_usuario/' . $registro['id']) ?>" class="btn btn-warning btn-sm" title="Modificar usuario"><i class="bi bi-pencil"></i></a></td>
                            <td class="text-center"><a href="<?= base_url('eliminar_user/' . $registro['id']) ?>" class="btn btn-danger" title="Eliminar usuario"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" class="text-center">No hay categorias registradas</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?= $this->endSection() ?>