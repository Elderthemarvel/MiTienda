<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="row g-3">
            <div class="col-lg-4 d-flex">
                <div class="card flex-grow-1">
                    <div class="card-body">
                        <h5 class="text-primary">Búsqueda de cliente</h5>

                        <div class="d-flex mt-3">
                            <input class="form-control me-2" v-model="nit" type="text" placeholder="Ingrese Nit de cliente">
                            <button class="btn btn-outline-success" v-on:click="get_nit" type="submit">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 d-flex flex-wrap gap-3">
                                <div class="rounded-circle overflow-hidden border" style="width: 90px; height: 90px;">
                                    <img src="https://e7.pngegg.com/pngimages/867/694/png-clipart-user-profile-default-computer-icons-network-video-recorder-avatar-cartoon-maker-blue-text.png"
                                        width="100%" alt="">
                                </div>
                                <div>
                                    <div class="small text-primary fw-semibold">Nombre:</div>
                                    <div class="h5">{{razon}}</div>
                                    <div class="h6 text-muted">{{direccion}}</div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="small text-primary fw-semibold">Nit:</div>
                                <div class="h5">{{nit}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title text-primary">Carrito de compra</h5>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label for="" class="form-label text-muted fw-semibold">Productos:</label>
                    <select class="select2 form-control" name="state" id="select_productos" v-model="producto_select">
                        <option value="">Buscar</option>
                        <option v-for="producto in productos" :key="producto.id" :value="producto.id">
                         {{ producto.nombre }}
                        </option>
                    </select>
                </div>
                <input type="button" v-on:click="agregar_carrito" class="btn btn-success" value="Agregar">
                <div class="table-responsive" style="max-height: 41vh; overflow: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Descuento</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(producto_carrito,key) in productos_carrito">
                                <th scope="row">1</th>
                                <td width="50%"><input type="text" name="" v-model="producto_carrito.nombre" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" v-model="producto_carrito.precio_venta" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" v-model="producto_carrito.cantidad" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" v-model="producto_carrito.descuento" class="form-control form-control-sm"></td>
                                <td width="10%">{{producto_carrito.cantidad * producto_carrito.precio_venta - producto_carrito.descuento}}</td>
                                <td><a href="javascript.void(0)" v-on:click.prevent="eliminar(key)" class="nav-link text-danger"><i class="fs-5 las la-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h4 class="text-end my-3">Total a pagar: {{calcularTotal | moneda}} </h4>
                <div class="d-flex justify-content-end">
                
                    <button class="btn btn-primary text-uppercase" data-bs-toggle="modal" data-bs-target="#modal_pago" :disabled="calcularTotal <= 0">
                        <i class="las la-shopping-cart fs-5 me-2"></i> Finalizar Compra
                    </button>
                </div>

            </div>
        </div>


        <!-- Modal Pago-->
    <div class="modal fade" id="modal_pago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar pagos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div v-if="!pagado">
                        <div class="row border-bottom">
                            <div class="col d-flex justify-content-center">
                                <h1 class="text-primary">{{ calcularTotal | moneda}} </h1>
                            </div>
                            <div class="col text-center">
                                <p class="font-15">
                                    Credito: {{ saldo | moneda}}  <br>
                                    Pendiente: {{ faltante | moneda}}  <br>
                                    Cambio: {{ cambio | moneda}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border-right">
                                <form action="#" method="post"  id="pagos" v-on:submit.prevent="agregarMetodo">
                                    <div class="pt-3" v-if="saldo < calcularTotal">
                                        <div class="row" >
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tipo" class="control-label mb-1">Tipo de Pago</label>
                                                    <select name="tipo_pago" id="tipo" class="form-control" required>
                                                        <option value="" selected disabled>Seleccione una Opción</option>
                                                        <option v-for="(tipo_pago, key) in tipo_pagos" :value="key">{{tipo_pago.nom_tipo}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="numero" class="control-label mb-1">No. Comprobante</label>
                                                    <input id="numero" name="numero" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group has-success">
                                                    <label for="cantidad" class="control-label mb-1">Cantidad</label>
                                                    <input id="cantidad" step="0.01" v-model="pago" name="cantidad"  type="number" class="form-control" min="0.10" placeholder="Q 100.00" required>
                                                </div>  
                                            </div>
                                            <div class="col-6">
                                                <label for="f_pago" class="control-label mb-1">Fecha del Comprobante</label>
                                                <div class="input-group">
                                                    <input id="f_pago" name="f_pago" type="date" class="form-control" v-model="hoy" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3 d-grid">
                                        <input v-if="saldo < calcularTotal" type="submit" value="Agregar Pago" class="btn btn-lg btn-primary btn-block">
                                        <input v-if="saldo >= calcularTotal" v-on:click="guardar_recibo()" type="button" value="PAGAR" class="btn btn-lg btn-primary btn-block">
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                <div class="mt-1"> 
                                    Metodos agregados:
                                    <table class="table" v-if="metodos != '' ">
                                        <thead>
                                            <tr>
                                                <td>Tipo</td>
                                                <td>Cantidad</td>
                                                <td>Eliminar</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(metodo,index) in metodos">
                                                <td>{{metodo.n_metodo}}</td>
                                                <td>{{metodo.cantidad | moneda}}</td>
                                                <td v-if="metodo.metodo != 5"><i  v-on:click="borrar_metodo(index)" class="las la-trash-alt"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center p-5" v-else>
                                        <h3>No se han agregado pagos.</h3>
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
	const base_url = window.location.origin;
    var vm = new Vue({
        el: "#app",
		  data: {
            nit: 'CF',
            razon: 'CONSUMIDOR FINAL',
            direccion: 'CIUDAD',
            productos: [],
            productos_carrito: [],
            producto_select: '',
            metodos: [],
            pagado: false,
            pago:"",
            hoy:"<?= date('Y-m-d');?>",
            tipo_pagos:[],
		  },
		  methods: {
            get_nit: function() {
                blockUI();
                axios.get('<?= base_url('nit?nit=') ?>' + this.nit)
                .then(  response => {
                    if (response.data.RESPONSE[0]) {
                        let cliente = response.data.RESPONSE[0];
                        this.nit = cliente.NIT;
                        this.razon = cliente.NOMBRE;
                        this.direccion = cliente.Direccion;
                        unblockUI();
                    }else{
                        swal.fire({
                            title: 'Oops...',
                            text: 'No se encontro NIT intente de nuevo!',
                            icon: 'error'
                        });
                        unblockUI();
                    }
                });
            },
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
            agregar_carrito(){
                if (this.producto_select!='') {
                    if (this.productos_carrito.find(producto => producto.id == this.producto_select)) {
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Este producto ya esta en el carrito!',
                            icon: 'error'
                        });
                    }else{
                        let prod = this.productos.find(producto => producto.id == this.producto_select);
                        let producto_carrito = {
                            ...prod,                       // Copia las propiedades del producto original
                            cantidad: 1,                   // Cantidad predeterminada
                            descuento: 0,                  // Descuento predeterminado
                            subtotal: prod.precio_venta          // Inicializar subtotal con el precio
                        };
                        this.productos_carrito.push(producto_carrito);
                    }
                    
                }
            },
            eliminar(activityKey) {
                this.productos_carrito.splice(activityKey, 1);
            },
            agregarMetodo(){
                let form  =  new FormData(document.getElementById('pagos'));
                let pagos = {'n_metodo': this.tipo_pagos[form.get('tipo_pago')]['nom_tipo'],'metodo': form.get('tipo_pago'), 'numero': form.get('numero'), 'cantidad': form.get('cantidad'),  'f_pago': form.get('f_pago')};
                this.metodos.push(pagos);
                document.getElementById("pagos").reset(); 
                this.pago='';
            },
            listar_metodos(){
                axios.get(base_url + '/metodos/listar')
                .then(response=>{
                    if (!response.data.error) {
                        this.tipo_pagos=response.data.pagos;
                        unblockUI();
                    }else{
                        Swal.fire({
                            title: 'Oops...',
                            text: 'Aun no hay tipos de pago!',
                            icon: 'error'
                        });
                        unblockUI();
                    }
                })
            },

            borrar_metodo: function(index){
                this.metodos.splice(index,1);
            },
            guardar_recibo(){
                blockUI();
                let form = new FormData();
                form.append('carrito',JSON.stringify(this.productos_carrito));
                form.append('metodos',JSON.stringify(this.metodos));
                form.append('total',this.calcularTotal);
                form.append('nit',this.nit);
                axios.post(base_url + '/guardar_venta', form)
                    .then( response => {
                        unblockUI();
                        this.no_recibo = response.data.numero_recibo;
                        if (response.data.error== 0) {
                            console.log(response.data);
                        }else{
                                Swal.fire({
                                        icon: 'error',
                                        title: 'ERROR!',
                                        text:'Algo salio mal, intente de nuevo o consulte con su administrador!',
                                        showConfirmButton: false,
                                        timer: 2500
                                });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
		},
        mounted() {
            this.listar_productos();
            this.listar_metodos();
            // Inicializar Select2 y manejar el evento `change`
            const select = $('#select_productos');
            select.select2();

            // Sincronizar el valor de Select2 con `producto_select`
            select.on('change', () => {
            this.producto_select = select.val();
            });
        },
        watch: {
            producto_select(newValue) {
            $('#select_productos').val(newValue).trigger('change');
            },
            // Si `productos` cambia, se actualiza Select2 con las nuevas opciones
            productos() {
            this.$nextTick(() => {
                $('#select_productos').select2();
            });
            }
        },
	    computed: {
            calcularSubTotal: function(){
            total = 0;
            this.productos_carrito.forEach(elementAct => {
                total += parseFloat(elementAct['cantidad'] * elementAct['precio_venta']);
            });
            return total;
            },
            calcularDescuento: function(){
                descuento = 0; 
                this.productos_carrito.forEach(elementAct => {
                    descuento += parseFloat(elementAct['descuento']) || 0;
                });
                return descuento;
            },
            calcularTotal: function(){
                return this.calcularSubTotal - this.calcularDescuento;
            },
            saldo: function(){
            var total = 0;
            this.metodos.forEach( function (element){
                total += parseFloat(element.cantidad);
            } );
            return total;
            },
            faltante: function(){
                if(this.saldo < this.calcularTotal){
                    return this.calcularTotal - this.saldo;
                }else{
                    return 0;
                }  
            },
            cambio: function(){
                if(this.saldo > this.calcularTotal){
                    return this.saldo - this.calcularTotal;
                }else{
                    return 0;
                }  
            }
        },
        filters: {
            moneda : function(number){
                return new Intl.NumberFormat('es-GT', {style: 'currency',currency: 'GTQ', minimumFractionDigits: 2}).format(number);
            },
        },






		});

</script>

<?= $this->endSection() ?>