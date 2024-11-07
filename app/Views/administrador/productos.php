<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="container mt-5">
        <h2>Lista de Productos</h2>
        <a href="/producto/create" class="btn btn-success mb-3">Agregar Nuevo Producto</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Categoría</th>
                    <th>Nombre</th>
                    <th>Precio de Venta</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($clientes) && is_array($clientes)): ?>
                <?php foreach ($productos as $productos): ?>
                    <tr>
                        <td><?= esc($productos['id']) ?></td>
                        <td><?= esc($productos['id_categoria']) ?></td>
                        <td><?= esc($productos['nombre']) ?></td>
                        <td><?= esc($productos['precio_venta']) ?></td>
                        <td><?= esc($productos['stock']) ?></td>
                        <td>
                            <a href="/productos/edit/<?= $datosproductos['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="/productos/delete/<?= $datosproductos['id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay productos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>