<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Toaster Popup message CSS -->
    <link href="<?= base_url(); ?>/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/images/cob.png">
    <title>COBIENE | Login</title>

    <!-- page css -->
    <link href="<?= base_url(); ?>/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>/dist/css/style.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><![endif]-->

    <style type="text/css">
        .isDisabled {
            cursor: not-allowed;
        }
    </style>
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">COBIENE</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register">
            <div class="login-box card">
                <div class="card-body">
                    <div class="form-horizontal form-material" id="loginform">
                        <img src="assets\images\cob.png" alt="" class="rounded mx-auto d-block" width="35%">
                        <br>
                        <h3 class="text-center m-b-20">Inicie Sesión COBIENE</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="CIP" name="cip" value="" id="cip_user">
                                <div id="response"></div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <input type="submit" id="nxt-aut" class="btn w-100 btn-lg btn-info btn-rounded text-white" disabled>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                ¿No tienes una cuenta? <a href="<?= base_url('registrate') ?>" title="Registrate" class="text-info m-l-5"><b>Registrate</b></a>
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal" id="recoverform">
                        <h3 class="text-center m-b-20">Verificación Código COBIENE</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h2 class="text-center" id="number-lbl"></h2>
                                <input class="form-control" type="hidden" required="" id="number" value="" name="phone" disabled><br>
                                <center>
                                    <div id="recaptcha-container"></div>
                                </center>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <div id="recaptcha-container"></div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn w-100 btn-lg btn-cobiene btn-rounded text-white" type="button" id="btnSend" onclick="phoneAuths();">Enviar Código</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-horizontal" id="recoverform2">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3 class="text-center">Autenticación</h3>
                                <p class="text-muted">¡Ingrese su Codigo de Verificación! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" id="verificationCode" placeholder="Ingresa el Codido de Verificación">
                                <input type="hidden" id="phoneUser" value="">
                            </div>
                        </div>
                        <div class=" form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-100 text-uppercase waves-effect waves-light" type="button" id="btnV" onclick="codeverifys();">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>/assets/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>/dist/js/firebase.js" type="text/javascript"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script type="module" src="<?= base_url(); ?>dist/js/pages/firebase.js" type="text/javascript"></script>


    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#nxt-aut').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();

        });

        $("#cip_user").on("keyup", function() {
            var cip = $("#cip_user").val();
            var lengthCip = $("#cip_user").val().length;
            var dataCip = 'cip=' + cip;
            if (lengthCip >= 0) {
                $.ajax({
                    url: 'site/existsCip',
                    type: "GET",
                    data: dataCip,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.success == 1) {
                            $("#response").html(data.message);
                            $("#nxt-aut").attr('disabled', false);
                            $("#number-lbl").html("+51 " + data.phone);
                            $("#number").val("+51" + data.phone);
                            $("#phoneUser").val(data.phone);
                        } else {
                            $("#response").html(data.message);
                            $("#nxt-aut").attr('disabled', true);

                        }
                    },
                    error: function(data) {
                        console.log(data['responseText']);
                    }
                });
            }
        });
    </script>




</body>

</html>