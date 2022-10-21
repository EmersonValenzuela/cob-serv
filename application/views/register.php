<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/images/cob.png">
    <title>COBIENE | Registrate </title>
    <!-- page css -->
    <link href="<?= base_url(); ?>/assets/node_modules/register-steps/steps.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link href="<?= base_url(); ?>/dist/css/pages/register3.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Cargando...</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <a href="<?= base_url(); ?>" class="text-center m-b-40"><img src="<?= base_url(); ?>/assets/images/cob.png" alt="" class="rounded mx-auto d-block" width="10%"></a>
                <!-- multistep form -->
                <form id="msform" action="<?= base_url('registrate'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- progressbar -->
                    <ul id="eliteregister">
                        <li class="active">Datos de Accesso</li>
                        <li>Datos Personales</li>
                        <li>Imagenes Adjuntas</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Datos de Accesso</h2>
                        <h3 class="fs-subtitle">Paso 1</h3>
                        <input type="text" name="cip" placeholder="Ingrese  CIP" required id="cip" />
                        <div id="respuesta"></div>
                        <input type="button" name="next" class="next action-button" value="Siguiente" id="btnone" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Datos Personales</h2>
                        <h3 class="fs-subtitle">Paso 2</h3>
                        <input type="text" name="name" placeholder="Nombres" required />
                        <input type="text" name="lastname" placeholder="Apellidos" required />
                        <input type="text" name="dni" placeholder="DNI" required id="dni" />
                        <div id="respuestadni"></div>
                        <input type="text" name="email" placeholder="Correo Electrónico" id="mail" />
                        <div id="respuestamail"></div>
                        <input type="text" name="phone" placeholder="N° Celular" required id="phone" />
                        <div id="respuestaphone"></div>
                        <select name="range_user" class="select2 form-control form-select" style="width: 100%; height:36px;">
                            <option>Seleccionar Grado</option>
                            <optgroup label="Personal de Oficiales">
                                <?php
                                foreach ($range1 as $range) {
                                    echo '<option value="' . $range['id_range'] . '">' . $range['name_range'] . '</option>';
                                }
                                ?>
                            </optgroup>
                            <optgroup label="Personal Auxiliar o Subalterno">
                                <?php
                                foreach ($range2 as $range) {
                                    echo '<option value="' . $range['id_range'] . '">' . $range['name_range'] . '</option>';
                                }
                                ?>
                            </optgroup>
                            <optgroup label="Tropa Servicio Militar y Especialista">
                                <?php
                                foreach ($range3 as $range) {
                                    echo '<option value="' . $range['id_range'] . '">' . $range['name_range'] . '</option>';
                                }
                                ?>
                            </optgroup>
                        </select>
                        <input type="button" name="previous" class="previous action-button" value="Anterior" />
                        <input type="button" name="next" class="next action-button" value="Siguiente" id="cip" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Imagenes Adjuntas</h2>
                        <h3 class="fs-subtitle">Paso Final</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Foto CIP</h4>
                                        <input type="file" name="img_cip" id="input-file-now" class="dropify" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Foto DNI</h4>
                                        <input type="file" name="img_dni" id="input-file-now1" class="dropify" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="previous action-button" value="Anterior" id="anterior"/>
                        <input type="submit" name="submit" class="action-button" value="Registrarme" id="register" />
                    </fieldset>

                </form>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>


    <!-- Bootstrap tether Core JavaScript -->
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url(); ?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

    <script src="<?= base_url(); ?>assets/node_modules/register-steps/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>assets/node_modules/register-steps/register-init.js"></script>
    <!-- jQuery file upload -->
    <script src="<?= base_url(); ?>assets/node_modules/dropify/dist/js/dropify.min.js"></script>

    <!-- js pages files -->
    <script src="<?= base_url(); ?>dist/js/pages/register.js"></script>


    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });

        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        $(function() {
            $(".select2").select2();
        });

        $("#register").on("keyup", function() {
            let btn = document.getElementById("register");
            let btn2 = document.getElementById("anterior");
            btn.disabled = true;
            btn.value = "Registrando ...";
            btn2.style = "display: none;";

            setTimeout(function() {
                btn.disabled = false;
                btn.value = "Enviar";
            }, 10000);
        });
    </script>
</body>

</html>