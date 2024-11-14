<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="productos" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
var vm = new Vue({
    el: "#app",
		data: {
            productos: [],
		},
		methods: {
            listar_productos(){
                blockUI();
                axios.get('<?= base_url('productos/listar') ?>')
                .then(  response => {
                    if (!response.data.error) {
                        this.productos = response.data.productos;
                        unblockUI();
                    }else{
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Aun no hay productos!',
                            icon: 'error'
                        });
                        unblockUI();
                    }
                });
            },
            inicializarDataTable() {
                if ($.fn.DataTable.isDataTable('#productos')) {
                    $('#productos').DataTable().destroy();
                }
                // Inicializa el DataTable
                $('#productos').DataTable({
                    data: this.productos,
                    columns: [
                    { data: null, render: (data, type, row, meta) => meta.row + 1 },
                    { data: 'id' },
                    { data: 'nombre' },
                    { data: 'precio_venta' },
                    { data: 'stock' },
                    ],
                });
            }
		},
        mounted() {
            this.listar_productos();
        },
        watch: {
        productos() {
            this.$nextTick(() => {
                this.inicializarDataTable();
            });
        }
    }

	});
</script>
<?= $this->endSection() ?>