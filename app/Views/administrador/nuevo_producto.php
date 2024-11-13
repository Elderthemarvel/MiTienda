<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>


<h2>Formulario de Producto</h2>
<div class="container mt-5">
        <h2 class="mb-4">Agregar Producto</h2>
        <form action="<?= base_url('/guardar_producto') ?>" method="post">
            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoría</label>
                
                <select name="id_categoria" id="id_categoria" class="form-control" required>
                    <option value="" hidden >Seleccione una opción</option>
                    <?php foreach ($categorias as $categoria) {?>
                        <option value="<?= $categoria['id']?> "><?= $categoria['nom_categoria']?></option>
                    <?php    
                    }
                    ?>
                </select>
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