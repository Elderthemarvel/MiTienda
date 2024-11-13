<?= $this->extend('template') ?>

<?= $this->section('contenido') ?>
<div class="row g-3 mt-3">
            <div class="col-lg-4 d-flex">
                <div class="card flex-grow-1">
                    <div class="card-body">
                        <h5 class="text-primary">Búsqueda de cliente</h5>
                        <form class="d-flex mt-3">
                            <input class="form-control me-2" type="text" placeholder="Ingrese Nit de cliente">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 d-flex flex-wrap gap-3">
                                <div class="rounded-circle overflow-hidden border" style="width: 90px; height: 90px;">
                                    <img src="https://e7.pngegg.com/pngimages/867/694/png-clipart-user-profile-default-computer-icons-network-video-recorder-avatar-cartoon-maker-blue-text.png"
                                        width="100%" alt="">
                                </div>
                                <div>
                                    <div class="small text-primary fw-semibold">Nombre:</div>
                                    <div class="h5">Elder Alejandro Gonzales Guzman</div>
                                    <div class="h6 text-muted">Ciudad de Guatemala</div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="small text-primary fw-semibold">Nit:</div>
                                <div class="h5">2107263</div>
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
                    <select class="select2 form-control" name="state">
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

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
                            <tr>
                                <th scope="row">1</th>
                                <td width="50%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td><a href="" class="nav-link text-danger"><i class="fs-5 las la-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td width="40%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td><a href="" class="nav-link text-danger"><i class="fs-5 las la-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td width="40%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td><a href="" class="nav-link text-danger"><i class="fs-5 las la-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td width="40%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td><a href="" class="nav-link text-danger"><i class="fs-5 las la-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td width="40%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td width="10%"><input type="text" name="" class="form-control form-control-sm"></td>
                                <td><a href="" class="nav-link text-danger"><i class="fs-5 las la-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h4 class="text-end my-3">Total a pagar: Q 100.00 </h4>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary text-uppercase">
                        <i class="las la-shopping-cart fs-5 me-2"></i> Finalizar Compra
                    </button>
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
        
		  },
		  methods: {
      
		  },
		  computed: {
       
      },
      filters: {
        moneda : function(number){
            return new Intl.NumberFormat('es-GT', {style: 'currency',currency: 'GTQ', minimumFractionDigits: 2}).format(number);
        },
      },






		});

</script>

<?= $this->endSection() ?>