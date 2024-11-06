<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>


<h2>Formulario de Producto</h2>
    <form action="/ruta_de_envio" method="POST">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>

        <label for="id_categoria">Categoría:</label>
        <select name="" id="">
                <option hidden>Seleccione una opcion</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?= $categoria['id'] ?>"><?= $categoria['nom_categoria'] ?></option>
            <?php endforeach ?>
        </select>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="precio_venta">Precio de Venta:</label>
        <input type="number" step="0.01" id="precio_venta" name="precio_venta" required><br><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br><br>

        <button type="submit">Enviar</button>
    </form>


<?= $this->endSection() ?>