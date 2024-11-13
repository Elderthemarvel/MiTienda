<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<body>
    <div class="container mt-5">
        <h1 class="mb-5">Modificar Contraseña</h1>

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

        <form action="<?= base_url('/mod_pass/' . $usuario['id']) ?>" method="post" class="row g-3">
            <div class="col-12 mb-3">
                <h3>Usuario: <h5><?= esc($usuario['nombre']) ?></h45></h3>
            </div>

            <div class="row mb-3">
                <label for="pass1" class="col-md-4 col-form-label">Ingresa nueva contraseña</label>
                <div class="col-md-8">
                    <input type="password" class="form-control form-control-sm w-auto" id="pass1" name="pass1" maxlength="30" style="width: 20ch;" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="pass2" class="col-md-4 col-form-label">Vuelve a escribir la nueva contraseña</label>
                <div class="col-md-8">
                    <input type="password" class="form-control form-control-sm w-auto" id="pass2" name="pass2" maxlength="30" style="width: 20ch;" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2"></div> 
                <div class="col-md-4 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-sm">Guardar Cambios</button>
                    <a href="<?= base_url('/usuario') ?>" class="btn btn-secondary btn-sm">Cancelar</a>
                </div>
            </div>

        </form>
    </div>

</body>

<?= $this->endSection() ?>


