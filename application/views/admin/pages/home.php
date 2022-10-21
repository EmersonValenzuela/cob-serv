<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    :root {
        --primary-color: rgb(58, 79, 105);
        --secundary-color: rgb(157, 167, 180);
        --thir-color: rgb(99, 122, 58);
        --primary-color-hover: rgb(30, 50, 75);
        --secundary-color-hover: rgb(110, 116, 124);
    }

    h1 {
        width: 80%;
        text-align: center;
        margin: 50px auto 15px auto;
        color: var(--thir-color);
    }

    .container {
        width: 400px;
        margin: 10px auto;
        padding: 0;
    }

    .group {
        position: relative;
        width: 100%;
        height: 400px;
        padding: 0;
        outline: 1px solid var(--secundary-color);
        border-radius: 50%;
        overflow: hidden;
    }

    .group .crop-image {
        width: 100%;
    }

    .group #input-file {
        display: none;
    }

    .group .label-file {
        position: absolute;
        text-align: center;
        width: 100%;
        margin: auto;
        background-color: rgba(157, 167, 180, 0.74);
        padding: 30px 70px;
        font-size: 18px;
        bottom: -101%;
        left: 0;
        cursor: pointer;
        transition: all 150ms ease-in-out;
        color: var(--primary-color);
    }

    .group:hover .label-file {
        bottom: 0;
    }

    /* ==== Modal estilos ==== */

    .modal {
        background-color: rgba(0, 0, 0, 0.247);
        backdrop-filter: blur(0px);
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        visibility: hidden;
        transition: all 150ms ease-in-out;
        overflow: auto;
        padding: 20px;
    }

    .modal-content {
        width: 1200px;
        margin: auto;
        background-color: rgb(250, 250, 250);
        border-radius: 10px;
        overflow: hidden;
        transform: scale(0.9);
        opacity: 0;
        transition: 400ms 300ms all ease;
    }

    .modal-content .modal-header {
        width: 100%;
        padding: 20px 10px;
        text-align: center;
        background-color: rgb(249, 249, 249);
        box-shadow: 0px -2px 7px 1px rgba(0, 0, 0, 0.281);
        font-size: 18px;
    }

    .modal-content .modal-body {
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        padding: 18px 10px;
    }

    .modal-body .content-imagen-cropper {
        width: 100%;
        height: 400px;
        padding: 5px;
        outline: 2px solid var(--thir-color);
    }

    .content-imagen-cropper .img-cropper {
        width: 100%;
    }

    .modal-body .content-imagen-sample {
        height: 200px;
        width: 200px;
        outline: 1px solid var(--thir-color);
        border-radius: 100%;
        overflow: hidden;
    }

    .modal-body .content-imagen-sample .img-sample {
        height: 100%;
        width: 100%;
    }

    .modal-content .modal-footer {
        width: 100%;
        padding: 10px 10px;
        text-align: center;
        background-color: rgb(249, 249, 249);
        box-shadow: 0px 2px 7px 1px rgba(0, 0, 0, 0.281);
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 15px;
    }

    .modal-footer .btn {
        border: none;
        padding: 12px 70px;
        border-radius: 5px;
        font-size: 15px;
        cursor: pointer;
        color: #fff;
        transition: background-color 300ms ease;
    }

    .modal-footer .primary {
        background-color: var(--primary-color);
    }

    .modal-footer .secundary {
        background-color: var(--secundary-color);
    }

    .modal-footer .primary:hover {
        background-color: var(--primary-color-hover);
    }

    .modal-footer .secundary:hover {
        background-color: var(--secundary-color-hover);
    }

    /* ==== Modal estilos active ==== */

    .modal.active {
        opacity: 1;
        backdrop-filter: blur(3px);
        visibility: visible;
    }

    .modal-content.active {
        transform: scale(1);
        opacity: 1;
    }

    .modal.remove {
        opacity: 0;
        backdrop-filter: blur(0px);
        visibility: hidden;
        transition: 150ms 150ms all ease-in-out;
    }

    .modal-content.remove {
        transform: scale(0.9);
        opacity: 0;
        transition: 150ms all ease;
    }

    @media screen and (max-width: 1200px) {
        .modal-content {
            width: 100%;
        }

        .container {
            width: 90%;
        }

        .group {
            width: 400px;
            height: 400px;
            margin: auto;
        }

        .group .label-file {
            padding: 10px 10px 30px 10px;
        }
    }

    @media screen and (max-width: 1200px) {
        .content-imagen-sample {
            display: none;
        }

        .modal-body .content-imagen-cropper {
            width: 100%;
        }

        .modal-content .modal-footer {
            flex-direction: column;
            gap: 5px;
        }

        .modal-footer .btn {
            width: 100%;
        }

        .container {
            width: 90%;
        }

        .group {
            width: 200px;
            height: 200px;
            margin: auto;
        }
    }
</style>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
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
                <h4 class="text-themecolor">INICIO</h4>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img src="<?= base_url(); ?>assets/images/cob.png" class="img-circle" width="150" id="crop-image" />
                            <h4 class="card-title m-t-10">BIENVENIDO AL SISTEMA DE CONSULTAS DEL COBIENE</h4>
                        </center>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<div class="modal" id="modalcr">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Recorta tu foto</h2>
        </div>
        <div class="modal-body">
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

        <div class="modal-footer">
            <div class="fileupload btn btn-primary btn-rounded waves-effect waves-light">
                <span><i class="fas fa-upload"></i> &nbsp; Subir Imagen</span>
                <input type="file" class="upload" name="input-file" id="input-file" accept=".png,.jpg,.jpeg">
            </div>
            <button class="btn primary" id="cut">Recortar y guardar</button>
            <button class="btn secundary" id="close">Cancelar</button>
        </div>
    </div>
</div>