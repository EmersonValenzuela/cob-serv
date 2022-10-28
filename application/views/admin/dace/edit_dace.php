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
                        <h4 class="text-themecolor">Departamento de Administación de Casas del Ejército</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">DACE</a></li>
                                <li class="breadcrumb-item active">Formulario DACE</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Crear Consulta DAS</button>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">EDITAR SOLICITUD PARA ASIGNACIÓN DE CASA</h4>
                                </div>
                            </div>

                        </div>
                        <!-- ============================================================== -->
                        <!-- Start Card User -->
                        <!-- ============================================================== -->
                        <form action="<?= base_url('guardar-dace'); ?>" method="post">
                            <div class="card">
                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>DATOS PERSONALES DEL TITULAR</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <hr>
                                        <h3 class="card-title">TITULAR</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nombres</label>
                                                    <input name="name_user" type="text" class="form-control" placeholder="" value="<?= $this->session->userdata('user_name') ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Apellidos</label>
                                                    <input name="lastname_user" type="text" class="form-control" placeholder="" value="<?= $this->session->userdata('user_lastname') ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">N° CIP</label>
                                                    <input name="cip_user" type="text" class="form-control" placeholder="" value="<?= $this->session->userdata('user_cip') ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Grado</label>
                                                    <select name="range_user" class="select2 form-control form-select" style="width: 100%; height:36px">
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
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Correo Electrónico</label>
                                                    <input name="email_user" type="text" class="form-control" placeholder="Correo Electrónico" value="<?= $this->session->userdata('user_email') ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Telefono Fijo</label>
                                                    <input name="tel_user" type="text" class="form-control" placeholder="Fijo" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Celular</label>
                                                    <input name="phone_user" type="text" class="form-control" placeholder="Celular" value="<?= $this->session->userdata('user_phone') ?>" disabled>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Observación</label>
                                                    <input name="observation_user" type="text" class="form-control" placeholder="Observación" value="">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- End Card User -->
                                <!-- ============================================================== -->
                                <!-- Start Card Spouse and Sons -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>DATOS PERSONALES DE CONYUGE E HIJOS (**)</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <hr>
                                        <h3 class="card-title">CONYUGE</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Nombres</label>
                                                    <input name="name_spouse" type="text" class="form-control" placeholder="" value="<?= $spous->name_spouse ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Apellidos</label>
                                                    <input name="lastname_spouse" type="text" class="form-control" placeholder="" value="<?= $spous->lastname_spouse ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">N° CIP / CIF</label>
                                                    <input name="cip_spouse" type="text" class="form-control" placeholder="" value="<?= $spous->cip_spouse ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">N° DNI</label>
                                                    <input name="dni_spouse" type="text" class="form-control" placeholder="" value="<?= $spous->dni_spouse ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Grado</label>
                                                    <select name="range_spouse" class="select2 form-control form-select" style="width: 100%; height:36px;">
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
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Observación</label>
                                                    <input name="observation_spouse" type="text" class="form-control" placeholder="Observación" value="<?= $spous->obser_spouse ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <hr>
                                        <h3 class="card-title">HIJOS</h3>
                                        <hr>
                                        <div class="row">
                                            <div id="enter_children"></div>

                                            <div class="col-sm-3 nopadding">
                                                <label class="form-label">Nombres</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="Name" name="name_son[]" value="" placeholder="Nombres">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                                <label class="form-label">Apellidos</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="lastname_son[]" value="" placeholder="Apellidos">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                                <label class="form-label"> N° CIP / CIF</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="CIP" name="cip_son[]" value="" placeholder="CIP/CIF">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 nopadding">
                                                <label class="form-label"> DNI</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="DNI" name="dni_son[]" value="" placeholder="DNI">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 nopadding">
                                                <label class="form-label">Observaciones</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="Observation" name="observations[]" value="" placeholder="Observaciones">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-success text-white" type="button" onclick="enter_children();">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                            foreach ($sons as $key => $son) {
                                            ?>
                                                <div class="row">
                                                    <h4 class="card-title">HIJO</h4>
                                                    <div class="col-sm-3 nopadding">
                                                        <label class="form-label">Nombres</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Name" name="name_son[]" value="<?= $son->name_son_user ?>" placeholder="Nombres">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 nopadding">
                                                        <label class="form-label">Apellidos</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="lastname_son[]" value="<?= $son->lastname_son_user ?>" placeholder="Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 nopadding">
                                                        <label class="form-label"> N° CIP / CIF</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="CIP" name="cip_son[]" value="<?= $son->cip_son_user ?>" placeholder="CIP/CIF">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 nopadding">
                                                        <label class="form-label"> DNI</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="DNI" name="dni_son[]" value="<?= $son->dni_son_user ?>" placeholder="DNI">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 nopadding">
                                                        <label class="form-label">Observaciones</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="Observation" name="observations[]" value="<?= $son->observations ?>" placeholder="Observaciones">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-danger" type="button" onclick="remove_enter_children(<?= $son->id_son_user ?>);">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- End Card Spouse and Sons -->
                                <!-- ============================================================== -->

                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>LUGAR ACTUAL DE TRABAJO</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>

                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Unidad</label>
                                                    <input name="unit_workplace" type="text" class="form-control" placeholder="Unidad" value="<?= $workplace->unit_workplace_user ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Gran Unidad</label>
                                                    <input name="greatunit_workplace" type="text" class="form-control" placeholder="Gran Unidad" value="<?= $workplace->greatunit_workplace_user ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Nucleo</label>
                                                    <input name="core_workplace" type="text" class="form-control" placeholder="Nucleo" value="<?= $workplace->core_workplace_user ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>CAMBIADO DE COLOCACIÓN DE GGUU</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>

                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Unidad</label>
                                                    <input name="unit_gguu_placement" type="text" class="form-control" placeholder="Unidad" value="<?= $gguu->unit_gguu_placement ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Gran Unidad</label>
                                                    <input name="greatunit_gguu_placement" type="text" class="form-control" placeholder="Gran Unidad" value="<?= $gguu->greatunit_gguu_placement ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Nucleo</label>
                                                    <input name="core_gguu_placement" type="text" class="form-control" placeholder="Nucleo" value="<?= $gguu->core_gguu_placement ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>CAMBIADO DE COLOCACIÓN ZE</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>

                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Unidad</label>

                                                    <input name="unit_ze_placement" type="text" class="form-control" placeholder="Unidad" value="<?= $ze->unit_ze_placement ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Gran Unidad</label>
                                                    <input name="greatunit_ze_placement" type="text" class="form-control" placeholder="Gran Unidad" value="<?= $ze->greatunit_ze_placement ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Nucleo</label>
                                                    <input name="core_ze_placement" type="text" class="form-control" placeholder="Nucleo" value="<?= $ze->core_ze_placement ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>SOLICITUDES REITERATIVAS PARA ASIGNACIÓN DE CASA EN LA GUARNICIÓN DE LIMA (AÑOS ANTERIORES) (***)</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-12">

                                                <?php
                                                if ($rows_request <= "0") {
                                                ?>
                                                    <div class="row p-t-20">
                                                        <center>
                                                            <h4 class="card-title">FECHA DE PRESENTACION DE LAS SOLICITUDES</h4>
                                                        </center>
                                                        <hr>
                                                        <div id="enter_requests"></div>
                                                        <div class="col-sm-4 nopadding">
                                                            <label class="form-label">Día</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="day_request_home" name="day_request_home[]" value="" placeholder="Día">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 nopadding">
                                                            <label class="form-label">Mes</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="month_request_home" name="month_request_home[]" value="" placeholder="Mes">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 nopadding">
                                                            <label class="form-label">Año</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="year_request_home" name="year_request_home[]" value="" placeholder="Año">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-success text-white" type="button" onclick="enter_requests();">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="row p-t-20">

                                                        <center>
                                                            <h4 class="card-title">FECHA DE PRESENTACION DE LAS SOLICITUDES</h4>
                                                        </center>
                                                        <hr>
                                                        <?php
                                                        foreach ($request_home as $key => $row) {
                                                        ?>
                                                            <div class="col-sm-4 nopadding">
                                                                <label class="form-label">Día</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="day_request_home" name="day_request_home[]" value="<?= $row->day_request_home ?>" placeholder="Día">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 nopadding">
                                                                <label class="form-label">Mes</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="month_request_home" name="month_request_home[]" value="<?= $row->month_request_home ?>" placeholder="Mes">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 nopadding">
                                                                <label class="form-label">Año</label>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="year_request_home" name="year_request_home[]" value="<?= $row->year_request_home ?>" placeholder="Año">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-danger" type="button" onclick="remove_enter_children(<?= $son->id_son_user ?>);">
                                                                                <i class="fa fa-minus"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div id="enter_requests"></div>
                                                        <div class="col-sm-4 nopadding">
                                                            <label class="form-label">Día</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="day_request_home" name="day_request_home[]" value="" placeholder="Día">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 nopadding">
                                                            <label class="form-label">Mes</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="month_request_home" name="month_request_home[]" value="" placeholder="Mes">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 nopadding">
                                                            <label class="form-label">Año</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="year_request_home" name="year_request_home[]" value="" placeholder="Año">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-success text-white" type="button" onclick="enter_requests();">
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>OCUPACIÓN DE CASA DE AÑOS ANTERIORES EN LA GUARNICIÓN DE LIMA</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <center>
                                                <h4 class="card-title">PERIODO DE OCUPACIÓN DE CASA EN AÑOS ANTERIORES</h4>
                                            </center>
                                            <hr>
                                            <?php
                                            if ($request_home) {

                                                foreach ($occupancy_home as $key => $row) {
                                            ?>
                                                    <div class="col-sm-5 nopadding">
                                                        <label class="form-label">DESDE</label>
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" id="from_occupancy_home" name="from_occupancy_home[]" value="<?= $row->from_occupancy_home ?>" placeholder="Día">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 nopadding"></div>
                                                    <div class="col-sm-5 nopadding">
                                                        <label class="form-label">HASTA</label>
                                                        <div class="form-group">
                                                            <div class="input-group">

                                                                <input type="date" class="form-control" id="to_occupancy_home" name="to_occupancy_home[]" value="<?= $row->to_occupancy_home ?>" placeholder="Día">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-success text-white" type="button" onclick="enter_house();">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <div id="enter_house"></div>
                                            <div class="col-sm-5 nopadding">
                                                <label class="form-label">DESDE</label>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="from_occupancy_home" name="from_occupancy_home[]" value="" placeholder="Día">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 nopadding"></div>
                                            <div class="col-sm-5 nopadding">
                                                <label class="form-label">HASTA</label>
                                                <div class="form-group">
                                                    <div class="input-group">

                                                        <input type="date" class="form-control" id="to_occupancy_home" name="to_occupancy_home[]" value="" placeholder="Día">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-success text-white" type="button" onclick="enter_house();">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>PRIORIDADES PARA LA ASIGNACIÓN DE CASA (UBICACIÓN DE LA VILLA MILITAR)</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>

                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">1RA Prioridad</label>
                                                    <input name="first_priority_dace" type="text" class="form-control" placeholder="1RA Prioridad" value="">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">2DA Prioridad</label>
                                                    <input name="second_priority_dace" type="text" class="form-control" placeholder="2DA Prioridad" value="">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">3RA Prioridad</label>
                                                    <input name="third_priority_dace" type="text" class="form-control" placeholder="3RA Prioridad" value="">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>EN CASO DE SOLICITAR ASIGNACIÓN EXCEPCIONAL O ESPECIAL</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-7">
                                                <label class="form-label">TIPO DE SOLICITUD: </label>
                                                <div class="btn-group" data-bs-toggle="buttons">
                                                    <label class="btn btn-info text-white form-label">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio4" name="customRadio" class="form-check-input" value="COMÚN">
                                                            <label class="form-check-label" for="customRadio4">COMÚN</label>
                                                        </div>
                                                    </label>
                                                    <label class="btn btn-info text-white form-label">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio5" name="customRadio" class="form-check-input" value="EXCEPCIONAL">
                                                            <label class="form-check-label" for="customRadio5">EXCEPCIONAL</label>
                                                        </div>
                                                    </label>
                                                    <label class="btn btn-info text-white form-label">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio6" name="customRadio" class="form-check-input" value="ESPECIAL">
                                                            <label class="form-check-label" for="customRadio6">ESPECIAL</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">EL SUSCRITO SOLICITA ASIGNACIÓN EXCEPCIONAL O ESPECIAL POR EL MOTIVO SIGUIENTE: </label>
                                                <div class="form-group">
                                                    <textarea name="assignment" class="form-control" id="exampleTextarea" rows="3" placeholder="Escribir Aquí ......................."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">ADJUNTA DOCUMENTACIÓN: </label>
                                                <div class="btn-group" data-bs-toggle="buttons">
                                                    <label class="btn btn-info text-white form-label">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="doc" class="form-check-input" value="1">
                                                            <label class="form-check-label" for="customRadio1">SI</label>
                                                        </div>
                                                    </label>
                                                    <label class="btn btn-info text-white form-label">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="doc" class="form-check-input" value="2">
                                                            <label class="form-check-label" for="customRadio2">NO</label>
                                                        </div>
                                                    </label>
                                                    <label class="btn btn-info text-white form-label">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio3" name="doc" class="form-check-input" value="3">
                                                            <label class="form-check-label" for="customRadio3">FOJAS</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>FOTO DE HUELLA TITULAR Y CONYUGE</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="card center">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Titular Huella Indice Derecho (Foto)</h4>
                                                        <input type="file" name="img_tit" id="input-file-now1" class="dropify" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Conyuge Huella Indice Derecho (Foto)</h4>
                                                        <input type="file" name="img_con" id="input-file-now1" class="dropify" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="card">
                                    <div class="card-header text-white bg-info">
                                        <b>DOCUMENTOS ADJUNTOS</b>
                                        <div class="card-actions">
                                            <a class="text-white" data-action="collapse"><i class="ti-minus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="card center">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Titular Huella Indice Derecho (Foto)</h4>
                                                        <input type="file" name="img_tit" id="input-file-now1" class="dropify" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Conyuge Huella Indice Derecho (Foto)</h4>
                                                        <input type="file" name="img_con" id="input-file-now1" class="dropify" required />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>-->
                                <div class="offset-sm-10 col-md-2">
                                    <button type="button" class="btn waves-effect waves-light w-100 btn-success text-white">ENVIAR</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- script page  -->
        <!-- ============================================================== -->
        <script>
            function show_request() {
                document.getElementById('coll').innerHTML = "NO";
                document.getElementById('coll').classList.remove('btn-success');
                document.getElementById('coll').classList.add('btn-danger');
                document.getElementById('coll').setAttribute('onclick', 'show_not_request()');
            }

            function show_not_request() {
                document.getElementById('coll').innerHTML = "SI";
                document.getElementById('coll').classList.remove('btn-danger');
                document.getElementById('coll').classList.add('btn-success');
                document.getElementById('coll').setAttribute('onclick', 'show_request()');

            }

            function show_house() {
                document.getElementById('btn-house').innerHTML = "NO";
                document.getElementById('btn-house').classList.remove('btn-success');
                document.getElementById('btn-house').classList.add('btn-danger');
                document.getElementById('btn-house').setAttribute('onclick', 'show_not_house()');
            }

            function show_not_house() {
                document.getElementById('btn-house').innerHTML = "SI";
                document.getElementById('btn-house').classList.remove('btn-danger');
                document.getElementById('btn-house').classList.add('btn-success');
                document.getElementById('btn-house').setAttribute('onclick', 'show_house()');

            }

            $(function() {
                // For select 2
                $(".select2").select2();

            });
        </script>

        <!-- ============================================================== -->
        <!-- End script page  -->
        <!-- ============================================================== -->