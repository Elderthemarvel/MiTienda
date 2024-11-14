<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-header">
        <h1>Formulario de Usuario</h1>
    </div>
    <div class="card-body">
         <!-- Bloque para mostrar mensajes de error -->
         <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/guardar_usuario') ?>" method="post" class="row g-3 align-items-center">
            <div class="col-md-2">
                <label for="id_tipo" class="form-label">Tipo</label>
            </div>
            <div class="col-md-4">
                <select class="form-select form-select-sm" name="id_tipo" id="id_tipo" required>
                    <option value="">Seleccione tipo de usuario</option>
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
                    <option value="">Seleccione un valor</option>
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
            <div class="col-md-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-sm me-2">Guardar</button>
                <a href="<?= base_url('/usuario') ?>" class="btn btn-secondary btn-sm">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>