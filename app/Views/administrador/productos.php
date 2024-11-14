<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
    <div class="card">
        <div class="card-header">
        <h2>Lista de Productos</h2>
        </div>
        <div class="card-body">
            <!--<a href="<?=base_url('/nuevo_producto') ?>" class="btn btn-success mb-3">Agregar Nuevo Producto</a>-->
        <div class="table-responsive">
        <table class="table table-striped" id="productos" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
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
                            <td><?= esc($producto['nom_categoria']) ?></td>
                            <td><?= esc($producto['nombre']) ?></td>
                            <td><?= esc($producto['precio_venta']) ?></td>
                            <td><?= esc($producto['stock']) ?></td>
                            <td>
                                <a href="/productos/edit/<?= $producto['id'] ?>" class="btn btn-warning"><i class="las la-edit"></i></a>
                                <a href="/productos/confirm-delete/<?= $producto['id'] ?>" class="btn btn-danger"><i class="las la-trash-alt"></i></a>
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
            
        </div>
    </div>
       
       
        
  

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready( function () {
        $('#productos').DataTable();
    } );
</script>
<?= $this->endSection() ?>