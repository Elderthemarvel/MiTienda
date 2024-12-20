<!DOCTYPE html>
<html lang="es-GT">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | Mi tienda</title>

        <!-- link styles -->
        <link rel="stylesheet" href="<?= base_url('/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?= base_url('/css/style.css')?>">
        <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    </head>

    <body>
        <!-- Container login -->
        <main class="container-login" id="app">
            
            <article class="content-login">
                <section class="card-login p-2">
                    <header>
                        <div class="text-center mt-3">
                            <h2 class="fw-medium fs-2">Iniciar sesión</h2>
                            <p class="text-body-tertiary">Por favor ingrese sus credenciales</p>
                        </div>     
                    </header>
                    <article class="body-login">
                        <form v-on:submit.prevent="Login()" id="login" autocomplete="off">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium text-body-tertiary">Usuario:</label>
                                <input type="text" class="form-control" id="username" name="user" placeholder="Ingresa tu usuario aqui">
                            </div>
                            <div class="mb-3">
                                <label for="pass_user" class="form-label fw-medium text-body-tertiary">Contraseña:</label>
                                <input type="password" class="form-control" id="pass_user" name="pass" placeholder="Ingresa tu contraseña aqui">
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-primary fs-18">Iniciar sesión</button>
                            </div>
                        </form>
                    </article>
                </section>
                
                <div class="icon-bg ">
                    <img src="<?= base_url('images/discount.png')?>" alt="marca de agua">
                </div>
            </article>
            <article class="d-md-flex d-none justify-content-center align-items-center content-image-login bg-light">
                <img src="<?= base_url('images/logo.png')?>" alt="logo">
            </article>
        </main>

        <!-- /Container login -->
    <script src="<?= base_url('/js/bootstrap.bundle.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('/js/axios.js') ?>"></script>

    <script>
        var vue = new Vue({
            el: '#app',
            data: {
                user: '',
                pass: ''
            },
            methods: {
                Login: function () {
                    var form = document.getElementById('login');
                    var formData = new FormData(form);
                    axios.post('<?= base_url('login') ?>', formData)
                    .then(function (response) {
                        console.log(response);
                        if (response.data.success) {
                            
                            window.location.href = '<?= base_url('home') ?>';
                                
                        } else {
                            Swal.fire({
                                title: '¡Error!',
                                text: response.data.message,
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
            }
        });
    </script>


    </body>
</html>