<?= $this->extend('template') ?>
<?= $this->section('contenido') ?>

<div class="mt-5">
    <h3>Editar Categoría</h3>
    <form action="<?php echo base_url('categoria/actualizar/' . $categoria['id']); ?>" method="post">
        <div class="form-group">
            <label for="nombreCategoria">Nombre de la Categoría</label>
            <input type="text" name="nom_categoria" id="nombreCategoria" class="form-control" value="<?php echo $categoria['nom_categoria']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Categoría</button>
        <a href="<?php echo base_url('categoria'); ?>" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>


<?= $this->endSection() ?>