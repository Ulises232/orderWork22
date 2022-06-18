<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    date_default_timezone_set("Asia/Manila");

    include "public/config.php";

    ob_start();
   if(isset($_GET['page'])){
        $title = explode("/",  $_GET['page']);
        $title = $title[0]." ".$title[1] ;
        $title = ucwords($title);
    }else{
        $title = "Home";
    }

    ?>
    <title><?php echo $title ?> | <?php echo $_SESSION['system']['name'] ?></title>
    <?php ob_end_flush() ?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/toastr/toastr.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/dropzone/min/dropzone.min.css">
    <!-- DateTimePicker -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/dist/css/jquery.datetimepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Switch Toggle -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/dist/css/styles.css">
    <script src="<?php echo SERVERURL ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo SERVERURL ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/plugins/summernote/summernote-bs4.min.css">


    <!-- css propios -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>assets/css/style.css">

    <!-- js propios -->
    <script src="<?php echo SERVERURL ?>assets/js/javascript.js"></script>


</head>