<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<h1 class="text-center mb-4">Créditos del Software</h1>

<!-- Colaboradores -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Colaboradores</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Elder Alejandro González Guzmán - 201016328</strong> – Login, CRUD de recibos, migraciones y seeders.
            </li>
            <li class="list-group-item">
                <strong>Sergio David Sunun Tubac - 201021092</strong> – CRUD Productos, Stock, Documentación.
            </li>
            <li class="list-group-item">
                <strong>Luis Arturo Gabriel Cruz - 200615485</strong> – CRUD Usuarios, modificación de contraseña.
            </li>
            <li class="list-group-item">
                <strong>Diego Alejandro Martinez Donis - 201905800</strong> – CRUD Categorias.
            </li>
        </ul>
    </div>
</div>

<!-- Diseño Gráfico -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Diseño Gráfico</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Elder Alejandro González Guzmán - 201016328</strong> – Diseño de logotipo, íconos, y elementos visuales.
            </li>
        </ul>
    </div>
</div>

<!-- Fuentes y Librerías Externas -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Fuentes y Librerías Externas</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <strong>jQuery</strong> – Biblioteca de JavaScript (https://jquery.com/).
            </li>
            <li class="list-group-item">
                <strong>DataTables</strong> – Plugin de jQuery para tablas dinámicas (https://datatables.net/).
            </li>
            <li class="list-group-item">
                <strong>Bootstrap</strong> – Framework de diseño responsive (https://getbootstrap.com/).
            </li>
            <li class="list-group-item">
                <strong>Line Awesome</strong> – Biblioteca de iconos (https://icons8.com/line-awesome).
            </li>
            <li class="list-group-item">
                <strong>VueJS</strong> – Framework de JavaScript para reactividad (https://vuejs.org/guide/quick-start.html).
            </li>
            <li class="list-group-item">
                <strong>sweetalert2</strong> – Librería para manejo de alertas (https://sweetalert2.github.io/).
            </li>
        </ul>
    </div>
</div>

<?= $this->endSection() ?>