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
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="<?= base_url() ?><?= $this->session->userdata('user_img_profile') ?>" class="img-circle" width="150" id="crop-image" />
                            <h4 class="card-title m-t-10"><?= $this->session->userdata('user_name') ?></h4>
                            <h4 class="card-title m-t-10"><?= $this->session->userdata('user_lastname') ?></h4>
                            <h4 class="card-title m-t-10"><?= "CIP: " . $this->session->userdata('user_cip') ?></h4>
                            <h4 class="card-title m-t-10"><?= "DNI: " . $this->encryption->decrypt($this->session->userdata('user_dni')) ?></h4>
                            <div class="fileupload btn btn-primary btn-rounded waves-effect waves-light">
                                <span><i class="fas fa-upload"></i> &nbsp; Subir Imagen</span>
                                <input type="file" class="upload" name="input-file" id="input-file" accept=".png,.jpg,.jpeg">
                            </div>
                            <hr>
                    </div>


                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab">Editar Perfil</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#imge" role="tab">Editar Imagen perfil y Firma</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="form-profile">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombres</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="<?= $r->name_user ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Apellidos</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="<?= $r->lastname_user ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Correo Electronico</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-line" name="example-email" id="example-email" value="<?= $r->email_user ?>">
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
                                        <input type="file" name="" id="">
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                    <input type="file" name="" id="">

                                    </div>

                                    <hr>
                                    <div class="sl-item">
                                    <input type="file" name="" id="">

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

    <div class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <p>Recorta tu foto</p>
            </div>
            <div class="modal-body">
                <div class="content-imagen-cropper">
                    <img src="" alt="" class="img-cropper" id="img-cropper">
                </div>
                <div class="content-imagen-sample">
                    <div src="" alt="" class="img-sample" id="img-croppered"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn primary" id="cut">Recortar</button>
                <button class="btn secundary" id="close">Cancelar</button>
            </div>
        </div>
    </div>