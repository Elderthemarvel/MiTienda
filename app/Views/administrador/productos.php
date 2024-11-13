<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="container mt-5">
        <h2>Lista de Productos</h2>
       
        <a href="<?=base_url('/nuevo_producto') ?>" class="btn btn-success mb-3">Agregar Nuevo Producto</a>
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
            <?php if (!empty($productos) && is_array($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= esc($producto['id']) ?></td>
                        <td><?= esc($producto['id_categoria']) ?></td>
                        <td><?= esc($producto['nombre']) ?></td>
                        <td><?= esc($producto['precio_venta']) ?></td>
                        <td><?= esc($producto['stock']) ?></td>
                        <td>
                            <a href="/productos/edit/<?= $producto['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="/productos/delete/<?= $producto['id'] ?>" class="btn btn-danger">Eliminar</a>
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