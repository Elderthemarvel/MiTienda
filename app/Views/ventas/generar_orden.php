<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="ecommerce-widget">

		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-body">
						<div class="form-row">
							<div class="form-group col-md-10">
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-barcode"></i></span></div>
									<input type="text" name="codigo" id="bcode" placeholder="Barcode" class="form-control" v-model="bar_code" v-on:change="buscar_prod" autofocus>
								</div>
							</div>
              <div class="form-group col-md-2">
								<button class="btn btn-primary form-control" data-toggle="modal" data-target="#modal_productos"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>

				<div v-if="carrito.length > 0" class="card">
					<div class="card-header">
						<h4 class="d-flex justify-content-between align-items-center mb-0">
							<span class="text-muted">Carrito</span>
							<span class="badge badge-secondary badge-pill">{{carrito.length}}</span>
						</h4>
					</div>
					<div class="card-body">
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Producto</th>
                      <th style="width: 50px;">Cantidad</th>
                      <th>P/U</th>
                      <th>Sub-total</th>
                      <th>Descuento</th>
                      <th>Total</th>
                      <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody v-if=" carrito.length > 0 ">
                  <tr v-for = "(producto, key) in carrito" :key>
                    <td scope="row">{{key+1}}</td>
                    <td>{{producto.producto_name}}</td>
                    <td><input type="text" class="form-control" name="cantidad" id="cantidad" v-on:change="actualizar_cantidad" v-model="carrito[key].cantidad"></td>
                    <td>{{producto.precio}}</td>
                    <td>{{producto.precio * producto.cantidad}}</td>
                    <td data-toggle="modal" data-target="#descuentoModal" v-on:click="indice = key">{{producto.descuentoin}}</td>
                    <td>{{producto.precio * producto.cantidad - producto.descuentoin | moneda }}</td>
                    <td><a href="javascript:void(0)" v-on:click.prevent="borrarItems(key)" ><i class="far fa-trash-alt pl-2"></i></a></td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-right">Total (Q)</td>
                    <td colspan="2">{{calcularTotal | moneda}}</td>
                  </tr>
              </tbody>
            </table>
					</div>
				</div>

			</div>

			<!-- profile -->
			<!-- ============================================================== -->
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
				<!-- ============================================================== -->
				<!-- card profile -->
				<!-- ============================================================== -->
				<div class="card">
					<div class="card-body">
						<div class="text-center">
							<h1 class="mb-0">Total: {{calcularTotal | moneda}}</h1>
							<button class="btn btn-secondary mt-2" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false" :disabled="calcularTotal <= 0" > Pagar Orden </button>
              <button class="btn btn-primary mt-2" :disabled="calcularTotal <= 0 || alumno==''" v-on:click="credito=1; guardar_rec();"> Credito </button>

            </div>
					</div>
					<div class="card-body border-top">
            <div class="row">
                <div class="col-9"><h4 class="mb-0">Datos Clientes</h4></div>

            </div> 
						<div class="">
							<ul class="list-unstyled mt-2 mb-0">
							<li class="mb-2">
								<div class="input-group input-group-sm">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-search"></i></span></div>
                  <input type="text" placeholder="NIT"  v-on:change="get_nit" v-model="nit" class="form-control">
                </div>
							</li>
              <li class="mb-2"><i class="fas fa-fw fa-user-circle mr-2"></i>Cliente: {{nom_cliente+" "+ap_cliente}}</li>
							<li class="mb-2"><i class="fas fa-fw fa-id-badge mr-2"></i>Razón: {{razon}}</li>
							<li class="mb-2"><i class="fas fa-fw fa-home mr-2"></i>Dirección: {{direccion}}</li>
							<li class="mb-2">
								<div class="input-group input-group-sm">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                  <input type="text" placeholder="Username" class="form-control" v-model="correo">
                </div>
							</li>
						</div>
					</div>
					<!--<div class="card-body border-top">
						<h3 class="font-16">Rating</h3>
						<h1 class="mb-0">4.8</h1>
						<div class="rating-star">
							<i class="fa fa-fw fa-star"></i>
							<i class="fa fa-fw fa-star"></i>
							<i class="fa fa-fw fa-star"></i>
							<i class="fa fa-fw fa-star"></i>
							<i class="fa fa-fw fa-star"></i>
							<p class="d-inline-block text-dark">14 Reviews </p>
						</div>
					</div>-->
					<div class="card-body border-top">
						<h3 class="font-16">Vendedor</h3>
						<div>
							<a href="#" class="badge badge-light mr-1">demo</a>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- end card profile -->
				<!-- ============================================================== -->
			</div>
			<!-- ============================================================== -->
			<!-- end profile -->


		</div>

	</div>

  <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar pagos</h5>
                  <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="close-modal">&times;</span>
                  </a>
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
                                                  <option value="" disabled>Seleccione una Opción</option>
                                                  <option v-for="pago in tipo_pagos" :value="pago.id" :disabled="(pago.nom_metodo=='Efectivo' && blockefectivo==true) ? true: false">{{pago.nom_metodo}}</option>
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
                              <div class="pt-3" v-else>
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="form-group has-success">
                                          <textarea class="form-control" name="observaciones" placeholder="Observaciones" rows="3"></textarea>    
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                  <button v-if="saldo < calcularTotal" id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                      <i class="fas fa-money-bill-alt"></i>
                                      <span id="payment-button-amount">Agregar Pago</span>
                                  </button>
                                  <button v-if="saldo >= calcularTotal" id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                      <i class="fas fa-money-bill-alt"></i>
                                      <span id="payment-button-pagar" >Pagar {{calcularTotal | moneda}}</span>       
                                  </button>
                          </form>
                      </div>
              
                      <div class="col">
                          <div class="mt-1"> 
                              Metodos agregados:
                              <table class="w-100 table table-striped" v-if="metodos != '' ">
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
                                          <td v-if="metodo.metodo != 5"><i v-on:click="borrar_metodo(index)" class="fas fa-trash-alt"></i></td>
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
        usuario: JSON.parse(localStorage.getItem('user-active')) ?? '',
        fecha:"",
        observaciones:"",
        no_recibo:0,
        user : '1',
        nit: "CF",
        razon: "CONSUMIDOR FINAL",
        direccion: "Ciudad",
        correo:"info@centroeducativofiore.edu.gt",
        total : localStorage.getItem('total')  ?? 0,
        carrito: JSON.parse(localStorage.getItem('carrito')) ?? [],
        metodos: [],
        bar_code:"",
        pago:"",
        pagado: false,
        hoy:"<?= date('Y-m-d');?>",
        no:0,
        FAC:null,
        certificado:null,
        serie:null,
        tipo_pagos:[],
        blockefectivo: false,
        list_productos:[],
        id_prod:"",
        resultado:0,
        alumno:"",
        nom_cliente:"",
        ap_cliente:"",
        id_cliente:"",
        encargado:"",
        grado:"",
        credito:0,
        desc:"",
        tipo_descuento:"",
        indice:null,
		  },
		  methods: {
        nuevo_cliente(){
          blockUI();
          let form= document.getElementById('form_nuevo_cliente');
          let formData= new FormData(form);
          axios.post("<?=base_url('core/guardar_cliente')?>",formData)
          .then(response =>{
              if (!response.data.error ) {
                Swal.fire(
                  'Guardado!',
                  response.data.mensaje,
                  'success'
                );
                form.reset();
                $('#modal_nuevo_cliente').modal('hide');
                unblockUI();
              }else{
                Swal.fire(
                {
                  icon: 'error',
                  text:    response.data.mensaje,
                  showConfirmButton: false,
                  timer:2000,
                });
                unblockUI();
              }
          })
          .catch();
        },
        get_nit(){
					blockUI();
          axios.get(base_url+'/core/get_nit?nit='+this.nit)
          .then(response=>{
						unblockUI();
            if(response.data.RESPONSE[0].NIT !== ''){
              let datos = response.data.RESPONSE[0];
              this.nit = datos.NIT;
              this.razon = datos.NOMBRE;
              this.direccion = datos.Direccion;
            }else{
              Swal.fire(
                {
                  icon: 'error',
                  text:    'El NIT ingresado no existe, Verifique e intente de nuevo!',
                  showConfirmButton: false,
                  timer:2000,
                },
              );
              this.nit = "CF";
              this.razon = "CONSUMIDOR FINAL"
            }
          })
        },
        buscar_productos(){
          blockUI();
            form = document.getElementById('form_busqueda');
            form_data  = new FormData(form);
            axios.post(base_url + '/core/productos_por_nombre',form_data)
            .then(response=>{
              console.log(response.data);
              this.resultado = response.data;
              unblockUI();
            });
        },
        cerrar_modal(){
          form = document.getElementById('form_busqueda');
          form.reset();
          this.resultado=0;
          $('#modal_productos').modal('hide');
          this.buscar_prod();
        },
        buscar_prod(){
            blockUI();
            form_data = new FormData();
            form_data.append('codigo',this.bar_code);
            form_data.append('codigo2',this.id_prod);
            form_data.append('user',this.user);
            axios.post(base_url+'/core/buscar_producto',form_data)
            .then(response=>{
                if (response.data.error === 0) {
                    console.log(response.data);
                    let description = {
                        producto_name: response.data.producto.nombre,
                        precio:response.data.producto.precio_venta,
                        descuentoin: 0,
                        opciones: response.data.producto.id,
                        cantidad: 1,
                        reserva:[response.data.producto.reserva],
                        tipo:response.data.producto.tipo
                    }
                    this.bar_code="";
                    this.id_prod="";
                    this.agregar(description);
                    unblockUI();
                }else{
                  swalInit.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.data.msj + '!',
                    timer: 1500,
                    showConfirmButton: false,
                  });
                  this.bar_code="";
                  this.id_prod="";
                  unblockUI();
                }
            })
        },
        actualizar_cantidad(){
          localStorage.setItem('carrito', JSON.stringify(this.carrito));
        },
        agregar: function(datos){
          var index= null;
            this.carrito.forEach((element,key) => {
                if (datos.opciones == element.opciones) {
                    datos.cantidad= datos.cantidad + element.cantidad;
                    datos.precio= datos.precio;
                    datos.reserva = element.reserva.push(...datos.reserva);
                    index = key;
                }
            });
            if (datos.cantidad == 1) {
                this.carrito.push(datos);
                localStorage.setItem('carrito', JSON.stringify(this.carrito));
            }else{
                this.carrito[index].cantidad = datos.cantidad;
                this.carrito[index].precio = datos.precio;
                localStorage.setItem("carrito", JSON.stringify(this.carrito));
            }
        },
        borrarItems: function(key){
          this.borrar_item_reserva(key);
          if (this.carrito[key].cantidad == 1) {
              this.carrito.splice(key, 1);
              localStorage.setItem('carrito', JSON.stringify(this.carrito));
          }else{
              this.carrito[key].precio = this.carrito[key].precio;
              this.carrito[key].cantidad = this.carrito[key].cantidad -1;
              localStorage.setItem('carrito', JSON.stringify(this.carrito));
          }
        },
        borrar_item_reserva(key){
          let form = new FormData();
          form.append("reserva",JSON.stringify(this.carrito[key].reserva));
          axios.post(base_url+'/core/eliminar_reserva',form)
          .then(response =>{
            if(response.data.error){
              swalInit.fire({
								icon: 'error',
								title: 'Error',
								text: response.data.mensaje,
								timer: 1500,
								showConfirmButton: false,
							});
            }else{
              if (this.carrito[key]) {
                this.carrito[key].reserva.shift();
              }
               
            }
          });
        },
        borrar_metodo: function(index){
          if (this.metodos[index].n_metodo=="Efectivo" || this.metodos[index].n_metodo=="efectivo") {
            this.blockefectivo=false;
          }
          this.metodos.splice(index,1);
        },
        agregarMetodo(){
          let form  =  new FormData(document.getElementById('pagos'));
          if(form.get('observaciones') === null){
              if (this.tipo_pagos[form.get('tipo_pago')]['nom_metodo']=="Efectivo" ||this.tipo_pagos[form.get('tipo_pago')]['nom_metodo']=="efectivo") {
                this.blockefectivo=true;
              }
              let pagos = {'n_metodo': this.tipo_pagos[form.get('tipo_pago')]['nom_metodo'],'metodo': form.get('tipo_pago'), 'numero': form.get('numero'), 'cantidad': form.get('cantidad'),  'f_pago': form.get('f_pago')};
              this.metodos.push(pagos);
              document.getElementById("pagos").reset(); 
              this.pago='';
          }else{
            this.observaciones = form.get('observaciones');
            if (this.razon == "") {
              Swal.fire({
                icon: 'error',
                title: 'ERROR!',
                text:'No ingreso datos del NIT, verifiquelos datos de facturación!',
                showConfirmButton: false,
                timer: 2500
              });
            }else{
              //listo para procesar la data;
							this.guardar_rec();
              $('#exampleModal').modal('hide')
            }
          }
        },
        aplicar_descuento(){
          if (this.tipo_descuento!="" && this.desc!="") {
              if (this.tipo_descuento == 1) {
                  if (this.desc > 100) {
                      Swal.fire(
                      'Opps!',
                      'Selecciono porsentaje, el descuento no puede exceder el 100%!',
                      'error'
                      )
                  }else{
                      this.carrito[this.indice].descuentoin = parseFloat(this.carrito[this.indice].precio * this.desc / 100).toFixed(2);
                      localStorage.setItem("carrito", JSON.stringify(this.carrito));
                      this.desc="";
                      this.tipo_descuento="";
                      this.indice=null;
                      $('#descuentoModal').modal('hide');
                  }
              }else{
                  if (this.desc <= parseFloat(this.carrito[this.indice].precio)) {
                      this.carrito[this.indice].descuentoin = parseFloat(this.desc).toFixed(2);
                      localStorage.setItem("carrito", JSON.stringify(this.carrito));
                      this.desc="";
                      this.tipo_descuento="";
                      this.indice=null;
                      $('#descuentoModal').modal('hide');
                  }else{
                      Swal.fire(
                      'Opps!',
                      'El descuento no puede ser mayor al total!',
                      'error'
                      ) 
                  }
              }
              
              console.log(JSON.parse(localStorage.getItem("carrito"))[this.indice]);
          }else{
              Swal.fire(
              'Opps!',
              'Datos incompletos!',
              'error'
              )
          }

              
        },
        guardar_rec(){
					blockUI();
					let boton= document.getElementById("payment-button");
						boton.setAttribute('disabled', 'disabled');
						let fecha = new Date();
						const interno = {
								'codigo': "FIORE-"+ fecha.getFullYear() + fecha.getMonth() + fecha.getDay() +fecha.getHours() + fecha.getMinutes() + fecha.getSeconds()+ fecha.getMilliseconds()+"-FAC",
								'documento': 'FACT',
								'moneda': 'GTQ',
						};
						const receptor = {
								'nit': this.nit,
								'razon': this.razon,
								'direccion': this.direccion,
								'correo': this.correo,
						};
						const emisor = {
								'establecimiento': 3,
								'format': 'HTML',
								'frase': '1',
								'escenario': '2'
						};
						const items = [];
						this.carrito.forEach(element => {
							items.push({
								'descripcion': element.producto_name,
								'cantidad': parseInt(element.cantidad),
								'descuento': element.descuentoin,
								'unitario': element.precio,
								'total': element.precio * element.cantidad - element.descuentoin,
								'tipo': 'B',
								'medida':'CA'
							});
						});

						let form = new FormData();
						form.append('productos', JSON.stringify(items));
						form.append('receptor', JSON.stringify(receptor));
						form.append('emisor', JSON.stringify(emisor));
						form.append('interno', JSON.stringify(interno));
						form.append('carrito',JSON.stringify(this.carrito));
						form.append('metodos',JSON.stringify(this.metodos));
						form.append('total',localStorage.total);
						form.append('user',this.user);
            form.append('alumno',this.alumno);
						form.append('aut', this.certificado);
						form.append('no_fel',this.no);
						form.append('serie_fel',this.serie);
						form.append('nit',this.nit);
						form.append('cambio',this.cambio);
            form.append('credito',this.credito);
						axios.post(base_url + '/core/saveVenta', form)
							.then( response => {
								unblockUI();
								if (response.data.error== 0) {
                  this.imprimir_recibo(response.data.id_recibo);
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
        },
        listar_metodos(){
          axios.post(base_url + '/core/listar_metodos')
          .then(response=>{
            this.tipo_pagos=response.data;
          })
        },
        botonImprimir: function(){
            $("#exampleModal").modal('hide');
						printJS({
							printable: 'print',
							type: 'html',
						});
						this.vaciarCarrito();
        },
        vaciarCarrito: function(){
          blockUI();
          localStorage.removeItem('productos');
          localStorage.removeItem('carrito');
          localStorage.removeItem('total');
          let form = new FormData();
          form.append('user',this.user);
          axios.post(base_url+'/core/eliminar_reservas_usuario',form)
          .then(response=>{
            
            location. reload();
          });
        },
        lista_de_productos(){
          blockUI();
          axios.post(base_url+'/core/listar_productos')
          .then(response=>{
            console.log(response.data);
            this.list_productos = response.data;
            unblockUI();
          });
        },
        select_cliente(indice){
          if (indice) {
            this.nit=this.clientes[indice].nit;
            this.razon=this.clientes[indice].razon;
            this.direccion=this.clientes[indice].direccion;
            this.correo=this.clientes[indice].correo;
            this.alumno = this.clientes[indice].codigo;
            this.encargado = this.clientes[indice].encargado;
            this.grado = this.clientes[indice].grado;
            this.nom_cliente = this.clientes[indice].nombre;
            this.ap_cliente = this.clientes[indice].apellido;
            this.id_cliente = this.clientes[indice].id;
          }else{
            this.nit="CF";
            this.razon="CONSUMIDOR FINAL";
            this.direccion="Ciudad";
            this.correo="info@centroeducativofiore.edu.gt";
            this.alumno = "";
            this.encargado = "";
            this.grado = "";
            this.nom_cliente = "";
            this.ap_cliente = "";
            this.id_cliente = "";
          }
          
        },
        update_cliente(){
          blockUI();
          let form = document.getElementById("form_editar_cliente");
          let formData = new FormData(form);
          axios.post("<?=base_url('core/update_cliente')?>",formData)
          .then(response=>{
            $('#modal_editar_cliente').modal('hide');
            unblockUI();
            console.log(response.data)
            if (!response.data.error) {
              swalInit.fire({
                title: 'Actualizado',
                text: response.data.mensaje,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
              })
            }else{
              swalInit.fire({
              title: 'Error',
              text: response.data.mensaje,
              icon: 'error',
              confirmButtonText: 'Aceptar'
              });
            }
            
          })
          .catch();
        },
        imprimir_recibo(recibo){
          printJS({
            printable:'<?=base_url("core/imprimir_recibo?recibo=")?>'+recibo,
            type:'pdf',
            onPrintDialogClose: function() {
              vm.vaciarCarrito();
            },
            showModal:true,
            modalMessage:'Generando Documento, espere...',
            
          });
            
        }
		  },
		  computed: {
        calcularTotal: function(){
          var total = 0;
            this.carrito.forEach( function (element){
              let precios = 0;
              precios =  (element.precio * element.cantidad) - element.descuentoin;
              total += (precios);
            });
            if (this.descuento!=0 && this.descuento < total) {
                total = total - this.descuento;
            }else if(this.descuento > total){
                this.descuento='';
            }else{
                this.descuento = '';
            }
            localStorage.setItem('total',total);
            return total;
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
        },
        
      },
      filters: {
        moneda : function(number){
            return new Intl.NumberFormat('es-GT', {style: 'currency',currency: 'GTQ', minimumFractionDigits: 2}).format(number);
        },
      },






		});

</script>

<?= $this->endSection() ?>