<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="container mt-5">
        <h1 class="mb-4">Eliminar Productos</h1>

        <p>¿Está seguro que desea eliminar el producto <strong><?= esc($productos['nombre']) ?></strong>?</p>

        <form action="<?= base_url('/productos/delete/' . $productos['id']) ?>" method="post">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="<?= base_url('/administrador/productos') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>


<?= $this->endSection() ?>