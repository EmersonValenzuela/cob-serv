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
                        <h4 class="text-themecolor">Registros DACE</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url(); ?>">Inicio</a>
                                </li>
                                <li class="breadcrumb-item active">Registros DACE</li>
                            </ol>
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                                <i class="fa fa-plus-circle"></i> Solicitar</button>
                        </div>
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
                                <h4 class="card-title">Registros DACE</h4>
                                <h6 class="card-subtitle">Sus registros DACE</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-striped border">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Tipo de Asignación</th>
                                                <th>Fecha</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($list as $key => $row) {
                                            ?>
                                                <tr>
                                                    <td><?= $row->id_formdace ?></td>
                                                    <td><?= $this->session->userdata('user_name') ?></td>
                                                    <td>
                                                        <?php if ($row->assignment_type == "1") {
                                                            echo "Asignación Común";
                                                        } elseif ($row->assignment_type == "2") {
                                                            echo "Asignación Excepcional";
                                                        } elseif ($row->assignment_type == "3") {
                                                            echo "Asignación Especial";
                                                        } else {
                                                            echo "Asignación No Definida";
                                                        } ?>
                                                    </td>
                                                    <td><?= fecha($row->date_create_dace) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('pdf-dace/' . $row->token_formdace); ?>" target="_blank" class="btn btn-danger waves-effect waves-light" type="button" style="color: black;" title="Mostrar PDF"> <i class="far fa-file-pdf"></i> </a>
                                                        <a href=" <?= base_url('editar-DACE/' . $row->token_formdace); ?>" class="btn btn-info waves-effect waves-light" type="button" style="color: black;" title="Editar"> <i class="far fa-edit"></i> </a>
                                                        <button class="btn btn-warning waves-effect waves-light" type="button" style="color: black;" title="Eliminar"> <i class="far fa-trash-alt"></i> </button>
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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