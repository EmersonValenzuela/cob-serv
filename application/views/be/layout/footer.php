        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div id="idle-timeout-dialog" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Su sesión expirará pronto</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            <i class="fa fa-warning font-red"></i> Su sesión será bloqueada en
                            <span id="idle-timeout-counter"></span> seconds.
                        </p>
                        <p>¿Quieres continuar con tu sesión?</p>
                    </div>
                    <div class="modal-footer text-center">
                        <button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-success text-white" data-bs-dismiss="modal">Si, Seguir Trabajando</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="<?= base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?= base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?= base_url(); ?>dist/js/perfect-scrollbar.jquery.min.js"></script>
        <!--Wave Effects -->
        <script src="<?= base_url(); ?>dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="<?= base_url(); ?>dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="<?= base_url(); ?>dist/js/custom.min.js"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <script src="<?= base_url(); ?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

        <!-- ============================================================== -->
        <!--morris JavaScript -->

        <script src="<?= base_url(); ?>assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- Popup message jquery -->
        <script src="<?= base_url(); ?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
        <!-- Chart JS -->
        <script src="<?= base_url(); ?>assets/node_modules/toast-master/js/jquery.toast.js"></script>

        <script src="<?= base_url(); ?>assets/node_modules/dff/dff.js" type="text/javascript"></script>

        <!-- Session-timeout -->
        <script src="<?= base_url(); ?>assets/node_modules/session-timeout/idle/jquery.idletimeout.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/session-timeout/idle/jquery.idletimer.js"></script>

        <!--This page plugins -->
        <?php
        for ($i = 0; $i < count($scripts); $i++) {
            echo $scripts[$i];
        }
        ?>

        <!--HOME BE-->

        <script src="<?= base_url(); ?>assets/node_modules/Chart.js/Chart.min.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/Chart.js/chartjs.init.js"></script>


        <!-- Plugin JavaScript -->
        <script src="<?= base_url(); ?>assets/node_modules/moment/moment.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <!-- Clock Plugin JavaScript -->
        <script src="<?= base_url(); ?>assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
        <!-- Color Picker Plugin JavaScript -->
        <script src="<?= base_url(); ?>assets/node_modules/jquery-asColor/dist/jquery-asColor.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
        <!-- Date Picker Plugin JavaScript -->
        <script src="<?= base_url(); ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- Date range Plugin JavaScript -->
        <script src="<?= base_url(); ?>assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script>
            $(function() {

                // Custom button options
                $('.buttonClass').daterangepicker({
                    singleDatePicker: false,
                    buttonClasses: "btn",
                    applyClass: "btn-info",
                    cancelClass: "btn-danger",
                    startDate: moment().subtract(7, 'days'),
                    endDate: moment(),
                    minDate: moment().subtract(800, 'days'),
                    maxDate: moment(),
                    locale: {
                        format: 'DD/MM/YYYY',
                        daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        firstDay: 1
                    },
                    function(start, end) {
                        $("#fechainicio").val(start.format('YYYY-MM-DD'));
                        $("#fechafinal").val(end.format('YYYY-MM-DD'));
                        let fecha_inicio = $("#fechainicio").val();
                        let fecha_fin = $("#fechafinal").val();
                        get_lista_comprobantes(fecha_inicio, fecha_fin, id_sucursal, id_vendedor);
                    }

                });

            });
            $("#fechainicio").val(moment().subtract(7, 'days').format('YYYY-MM-DD'));
            $("#fechafinal").val(moment().format('YYYY-MM-DD'));
        </script>


        <script src="<?= base_url(); ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
        <!-- start - This is for export functionality only -->
        <script src="<?= base_url(); ?>buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="<?= base_url(); ?>ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="<?= base_url(); ?>ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="<?= base_url(); ?>ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="<?= base_url(); ?>buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>buttons/1.5.1/js/buttons.print.min.js"></script>

        <script>
            $(function() {
                $('#data-das').DataTable({
                    ordering: true,
                    
                    dom: 'Bfrtip',
                    buttons: [
                        'excel', 'pdf'
                    ]
                });
                $('.buttons-pdf, .buttons-excel').addClass('btn btn-success me-1');
            });
        </script>
        </body>

        </html>