<style>
    p {
        margin: 0;
    }

    .clear {
        clear: both;
    }

    .contentBox {
        width: 600px;
        height: auto;
        margin: 0 40px;
    }

    #menu li {
        float: left;
        list-style: none;
    }

    #menu li a {
        display: block;
        padding: 20px 50px;
        background: #CCC;
        text-decoration: none;
        text-transform: uppercase;
        color: #FFF;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .8);
        z-index: 5;
    }

    .overlay-relative {
        position: relative;
        z-index: 7;
    }

    .content2 {
        padding: 15px;
        overflow: hidden;
        background-color: #e7e7e7;
        background-color: rgba(0, 0, 0, 0.06);
    }

    h1 {
        padding-bottom: 15px;
        border-bottom: 1px solid #d8d8d8;
        font-weight: 600;
    }

    h1 span {
        font-family: monospace, serif;
    }

    h3 {
        padding-bottom: 20px;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), 0 2px 0 rgba(255, 255, 255, 0.9);
    }

    p {
        margin: 0;
        padding: 10px 0;
        color: #777;
    }

    .clear {
        clear: both;
    }


    .load-wrapp {
        float: left;
        width: 100%;
        height: 100px;
        margin: 0 10px 10px 0;
        padding: 20px 20px 20px;
        border-radius: 5px;
        text-align: center;
        background-color: #d8d8d8;
    }

    .load-wrapp p {
        padding: 0 0 20px;
    }

    .load-wrapp:last-child {
        margin-right: 0;
    }

    .line {
        display: inline-block;
        width: 15px;
        height: 15px;
        border-radius: 15px;
        background-color: #4b9cdb;
    }

    .ring-1 {
        width: 10px;
        height: 10px;
        margin: 0 auto;
        padding: 10px;
        border: 7px dashed #4b9cdb;
        border-radius: 100%;
    }

    .ring-2 {
        position: relative;
        width: 45px;
        height: 45px;
        margin: 0 auto;
        border: 4px solid #4b9cdb;
        border-radius: 100%;
    }

    .ball-holder {
        position: absolute;
        width: 12px;
        height: 45px;
        left: 17px;
        top: 0px;
    }

    .ball {
        position: absolute;
        top: -11px;
        left: 0;
        width: 16px;
        height: 16px;
        border-radius: 100%;
        background: #4282b3;
    }

    .letter-holder {
        padding: 16px;
    }

    .letter {
        float: left;
        font-size: 14px;
        color: #777;
    }

    .square {
        width: 12px;
        height: 12px;
        border-radius: 4px;
        background-color: #4b9cdb;
    }

    .spinner {
        position: relative;
        width: 45px;
        height: 45px;
        margin: 0 auto;
    }

    .bubble-1,
    .bubble-2 {
        position: absolute;
        top: 0;
        width: 25px;
        height: 25px;
        border-radius: 100%;
        background-color: #4b9cdb;
    }

    .bubble-2 {
        top: auto;
        bottom: 0;
    }

    .bar {
        float: left;
        width: 15px;
        height: 6px;
        border-radius: 2px;
        background-color: #4b9cdb;
    }

    .load-3 .line:nth-last-child(1) {
        animation: loadingC 0.6s 0.1s linear infinite;
    }

    .load-3 .line:nth-last-child(2) {
        animation: loadingC 0.6s 0.2s linear infinite;
    }

    .load-3 .line:nth-last-child(3) {
        animation: loadingC 0.6s 0.3s linear infinite;
    }

    .load-3 .line:nth-last-child(4) {
        animation: loadingC 0.6s 0.4s linear infinite;
    }

    .load-3 .line:nth-last-child(5) {
        animation: loadingC 0.6s 0.5s linear infinite;
    }

    .load-3 .line:nth-last-child(6) {
        animation: loadingC 0.6s 0.6s linear infinite;
    }

    @keyframes loadingC {
        0 {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(0, 15px);
        }

        100% {
            transform: translate(0, 0);
        }
    }

    .l-1 {
        animation-delay: 0.48s;
    }

    .l-2 {
        animation-delay: 0.6s;
    }

    .l-3 {
        animation-delay: 0.72s;
    }

    .l-4 {
        animation-delay: 0.84s;
    }

    .l-5 {
        animation-delay: 0.96s;
    }

    .l-6 {
        animation-delay: 1.08s;
    }

    .l-7 {
        animation-delay: 1.2s;
    }

    .l-8 {
        animation-delay: 1.32s;
    }

    .l-9 {
        animation-delay: 1.44s;
    }

    .l-10 {
        animation-delay: 1.56s;
    }

    .load-7 .square {
        animation: loadingG 1.5s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
    }

    .load-8 .line {
        animation: loadingH 1.5s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
    }

    .load-9 .spinner {
        animation: loadingI 2s linear infinite;
    }

    .load-9 .bubble-1,
    .load-9 .bubble-2 {
        animation: bounce 2s ease-in-out infinite;
    }

    .load-9 .bubble-2 {
        animation-delay: -1s;
    }

    .load-10 .bar {
        animation: loadingJ 2s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
    }
</style>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center" id="step5">
                <h4 class="text-themecolor">Mi Perfil</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card" id="step1">
                    <div class="card-body">
                        <center class="m-t-30">
                            <img src="<?= base_url() ?><?= $this->session->userdata('user_img_profile') ?>" class="img-circle" width="150" id="crop-image" />
                            <div class="spinner-grow text-primary" style="width: 0; height: 0;" role="status" id="spinner_profile">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <h4 class="card-title m-t-10"><?= $this->session->userdata('user_name') ?></h4>
                            <h4 class="card-title m-t-10"><?= $this->session->userdata('user_lastname') ?></h4>
                            <h4 class="card-title m-t-10"><?= "CIP: " . $this->session->userdata('user_cip') ?></h4>
                            <h4 class="card-title m-t-10"><?= "DNI: " . $this->encryption->decrypt($this->session->userdata('user_dni')) ?></h4>
                            
                            <div class="fileupload btn btn-primary btn-rounded waves-effect waves-light">
                                <span><i class="fas fa-upload"></i> &nbsp; Subir Imagen de Perfil</span>
                                <input type="file" class="upload" name="input-file" id="input-file" accept=".png,.jpg,.jpeg">
                            </div>

                            <hr>


                        </center>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab" id="step2"><strong>Editar Perfil</strong> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#imge" role="tab" id="step4"><strong>Imagen DNI, CIP y Firma</strong></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" >
                        <div class="tab-pane active" id="profile" role="tabpanel" >
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="form-profile" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombres</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="<?= $r->name_user ?>" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Apellidos</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="<?= $r->lastname_user ?>" name="lastname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Correo Electronico</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control email-inputmask" id="email-mask" value="<?= $r->email_user ?>" name="correo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Número de celular</label>
                                        <div class="col-md-12">
                                            <input disabled type="text" class="form-control form-control-line" value="<?= $r->phone_user ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success text-white">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="imge" role="tabpanel">
                            <div class="card-body">
                                <div class="profiletimeline">
                                    <div class="sl-item">
                                        <div class="load-wrapp wrapp_" style="display:none">
                                            <div class="load-3">
                                                <p>Cargando Imagen</p>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                        <div id="img_wrapp">
                                            <img src="<?= base_url($this->session->userdata('user_img_dni')); ?>" alt="" class="img-fluid rounded" id="img-dni">
                                        </div>

                                        <div class="fileupload btn btn-primary btn-rounded waves-effect waves-light">
                                            <span><i class="fas fa-upload"></i> &nbsp; Subir Imagen de DNI</span>
                                            <input type="file" class="upload" name="input-dni" id="input-dni" accept=".png,.jpg,.jpeg">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="load-wrapp wrapp_cip" style="display:none">
                                            <div class="load-3">
                                                <p>Cargando Imagen</p>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                        <div id="img_wrapp_cip">
                                            <img src="<?= base_url($this->session->userdata('user_img_cip')); ?>" alt="" class="img-fluid rounded" id="img-cip"><br>
                                        </div>
                                        <div class="fileupload btn btn-primary btn-rounded waves-effect waves-light">
                                            <span><i class="fas fa-upload"></i> &nbsp; Subir Imagen de CIP</span>
                                            <input type="file" class="upload" name="input-cip" id="input-cip" accept=".png,.jpg,.jpeg">
                                        </div>

                                    </div>

                                    <hr>
                                    <div class="sl-item">
                                        <div class="load-wrapp wrapp_sign" style="display:none">
                                            <div class="load-3">
                                                <p>Cargando Imagen</p>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                        <div id="img_wrapp_sign">
                                            <img src="<?= base_url($this->session->userdata('user_signature')); ?>" alt="" class="img-fluid rounded" id="img-sign">
                                        </div>

                                        <br>
                                        <div class="fileupload btn btn-primary btn-rounded waves-effect waves-light">
                                            <span><i class="fas fa-upload"></i> &nbsp; Subir Imagen de Firma</span>
                                            <input type="file" class="upload" name="input-sign" id="input-sign" accept=".png,.jpg,.jpeg">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

    <input type="hidden" value="<?=$this->session->userdata('cod_validation')?>" id="cod_val">

    <div class="modal" id="modalP">
        <div class="modal-content" id="modal-content">
            <div class="modal-header">
                <p>Recorta tu foto de Perfil</p>
            </div>
            <div class="modal-body">
                <div class="content-imagen-cropper">
                    <img src="" alt="" class="img-cropper" id="img-cropper">
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn primary" id="cut">Recortar</button>
                <button class="btn secundary" id="close">Cancelar</button>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-dni">
        <div class="modal-content" id="content-dni">
            <div class="modal-header">
                <p>Recorta tu foto de DNI</p>
            </div>
            <div class="modal-body">
                <div class="content-imagen-cropper">
                    <img src="" alt="" class="img-cropper" id="img-cropp-dni">
                </div>
                <div class="wrapper" style="display:none">
                    <div class="progress progress_wrapper">
                        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated progress_bar"></div>
                    </div>
                </div>
                <div class="wrapper_files">

                </div>

            </div>
            <div class="modal-footer">
                <div> <input id="upload-photo-image-rotate-value" type="hidden" name="rangeInputValue" value="0">
                    <label for="" id="lblrt"></label>
                    <input id="upload-photo-image-rotate-value-text" class="image-rotate-value" type="text" name="rangeInputValueText" value="0°" readonly>
                    <input id="upload-photo-image-rotate" class="image-rotate" type="range" name="rangeInput" step="1" min="-180" max="180" value="0">
                </div>

                <button class="btn primary" id="cut-dni">Recortar</button>
                <button class="btn secundary" id="close-dni">Cancelar</button>
            </div>
        </div>
    </div>


    <div class="modal" id="modal-cip">
        <div class="modal-content" id="content-cip">
            <div class="modal-header">
                <p>Recorta tu foto de CIP</p>
            </div>
            <div class="modal-body">
                <div class="content-imagen-cropper">
                    <img src="" alt="" class="img-cropper" id="img-cropp-cip">
                </div>

            </div>
            <div class="modal-footer">
                <div> <input id="upload-photo-image-rotate-value" type="hidden" name="rangeInputValue" value="0">
                    <label for="" id="lblrt"></label>
                    <input id="upload-photo-image-rotate-value-text" class="image-rotate-value" type="text" name="rangeInputValueText" value="0°" readonly>
                    <input id="upload-photo-image-rotate" class="image-rotate" type="range" name="rangeInput" step="1" min="-180" max="180" value="0">
                </div>

                <button class="btn primary" id="cut-cip">Recortar</button>
                <button class="btn secundary" id="close-cip">Cancelar</button>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-sign">
        <div class="modal-content" id="content-sign">
            <div class="modal-header">
                <p>Recorta tu foto de Firma</p>
            </div>
            <div class="modal-body">
                <div class="content-imagen-cropper">
                    <img src="" alt="" class="img-cropper" id="img-cropp-sign">
                </div>

            </div>
            <div class="modal-footer">
                <div> <input id="upload-photo-image-rotate-value" type="hidden" name="rangeInputValue" value="0">
                    <label for="" id="lblrt"></label>
                    <input id="upload-photo-image-rotate-value-text" class="image-rotate-value" type="text" name="rangeInputValueText" value="0°" readonly>
                    <input id="upload-photo-image-rotate" class="image-rotate" type="range" name="rangeInput" step="1" min="-180" max="180" value="0">
                </div>

                <button class="btn primary" id="cut-sign">Recortar</button>
                <button class="btn secundary" id="close-sign">Cancelar</button>
            </div>
        </div>
    </div>