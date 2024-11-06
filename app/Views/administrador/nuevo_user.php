<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<body>
    <div class="container mt-5">
        <h1 class="mb-5">Formulario de Usuario</h1>

        <form action="<?=base_url('/guardar_usuario')?>" method="post" class="row g-3 align-items-center">

            <div class="col-md-2">
                <label for="id_tipo" class="form-label">Tipo</label>
            </div>
            <div class="col-md-4">
                <select class="form-control form-control-sm" name="id_tipo" id="id_tipo" required>
                    <option hidden>Seleccione el tipo</option>
                    <option value="1">Administrador</option>
                    <option value="2">Vendedor</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="nombre" class="form-label">Nombre</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" maxlength="30" required>
            </div>
            
            <div class="col-md-2">
                <label for="apellido" class="form-label">Apellido</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control form-control-sm" id="apellido" name="apellido" maxlength="30" required>
            </div>

            <div class="col-md-2">
                <label for="pass" class="form-label">Contraseña</label>
            </div>
            <div class="col-md-4">
                <input type="password" class="form-control form-control-sm" id="pass" name="pass" maxlength="30" required>
            </div>

            <div class="col-md-2">
                <label for="correo" class="form-label">Correo</label>
            </div>
            <div class="col-md-4">
                <input type="email" class="form-control form-control-sm" id="correo" name="correo" maxlength="30" required>
            </div>

            <div class="col-md-2">
                <label for="genero" class="form-label">Género</label>
            </div>
            <div class="col-md-4">
                <select class="form-select form-select-sm" id="genero" name="genero" required>
                    <option value="">Seleccione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="O">Otro</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                <button type="reset" class="btn btn-secondary btn-sm">Cancelar</button>
            </div>
        </form>
    </div>

</body>

<?= $this->endSection() ?>