<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>


<h2>Formulario de Producto</h2>
<div class="container mt-5">
        <h2 class="mb-4">Agregar Producto</h2>
        <form action="<?= site_url('/producto/create') ?>" method="post">
            <div class="mb-3">
                <label for="id_categoria" class="form-label">ID Categoría</label>
                <input type="number" class="form-control" id="id_categoria" name="id_categoria" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="precio_venta" class="form-label">Precio de Venta</label>
                <input type="number" class="form-control" id="precio_venta" name="precio_venta" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
    </div>


<?= $this->endSection() ?>