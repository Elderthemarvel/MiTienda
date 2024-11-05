<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<h2>Formulario de Producto</h2>
    <form action="/ruta_de_envio" method="POST">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>

        <label for="id_categoria">ID Categoría:</label>
        <input type="number" id="id_categoria" name="id_categoria" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="precio_venta">Precio de Venta:</label>
        <input type="number" step="0.01" id="precio_venta" name="precio_venta" required><br><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required><br><br>

        <label for="created_at">Fecha de Creación:</label>
        <input type="datetime-local" id="created_at" name="created_at" required><br><br>

        <label for="updated_at">Fecha de Actualización:</label>
        <input type="datetime-local" id="updated_at" name="updated_at"><br><br>

        <label for="deleted_at">Fecha de Eliminación:</label>
        <input type="datetime-local" id="deleted_at" name="deleted_at"><br><br>

        <button type="submit">Enviar</button>
    </form>


<?= $this->endSection() ?>