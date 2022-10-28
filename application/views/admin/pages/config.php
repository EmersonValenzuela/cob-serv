<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Configuración de Imagenes</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Configuración</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h4>Importante!!</h4> <br>
                <ul>
                    <li>La siguiente imagen de tu firma que ingreses, se usara para las consultas que realices</li>
                    <br>
                    <li>Puede dibujar su firma en una hoja blanca, y tomar foto</li>
                    <br>
                    <li>Una vez guardado tu firma en imagen, ya no volvera a aparecer esta ventana, para modificarlo puedes ingresar en perfil</li>
                </ul>
            </div>

            <div class="col-md-8">
                <div class="content-imagen-cropper">
                    <img src="" alt="" class="img-cropper" id="img-cropper">
                    <input type="hidden" name="" id="url" value="<?= base_url(); ?>">
                </div>
            </div>
        </div>
    </div>
</div>