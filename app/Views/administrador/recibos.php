<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="card">
        <div class="card-header">
        <h2>Lista de Ventas</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped" id="recibos" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numero</th>
                        <th>Serie</th>
                        <th>Nit</th>
                        <th>Total</th>
                        <th>Fecha de Emisión</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($recibos) && is_array($recibos)): ?>
                    <?php foreach ($recibos as $recibo): ?>
                        <tr>
                            <td><?= esc($recibo['id']) ?></td>
                            <td><?= esc($recibo['numero']) ?></td>
                            <td><?= esc($recibo['serie']) ?></td>
                            <td><?= esc($recibo['nit']) ?></td>
                            <td>Q <?= esc($recibo['total']) ?></td>
                            <td><?= esc($recibo['fecha_creacion']) ?></td>
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
        $('#recibos').DataTable();
    } );
</script>
<?= $this->endSection() ?>