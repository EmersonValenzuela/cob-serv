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
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/images/favicon.png">
    <title><?= $title ?> | COBIENE</title>
    <!-- This page CSS -->


    <!-- chartist CSS -->
    <?php
    for ($i = 0; $i < count($links); $i++) {
        echo $links[$i];
    }
    ?>



    <link href="<?= base_url(); ?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?= base_url(); ?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url(); ?>dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->

    <link href="<?= base_url(); ?>dist/css/pages/footable-page.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/node_modules/footable/css/footable.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dist/css/pages/footable-page.css" rel="stylesheet">
    <link href="<?= base_url(); ?>dist/css/pages/contact-app-page.css" rel="stylesheet">


    <!-- LINKS DATE RANGE HOME -->
    <link href="<?= base_url(); ?>assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="<?= base_url(); ?>assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="<?= base_url(); ?>assets/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="<?= base_url(); ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="<?= base_url(); ?>assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">

</head>