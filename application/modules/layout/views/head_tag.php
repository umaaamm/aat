<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.png" type="image/x-icon">
    <title>Anugrah Agung Teknik</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/color-1.css" media="screen">
    <!-- Custom css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datatables.css">
    <!-- Notiflix css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/notiflix-2.7.0/dist/notiflix-2.7.0.min.css">
    <!-- DataTables css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css">

    <!-- latest jquery-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.js"></script>
    
    <!-- Notiflix js -->
    <script src="<?php echo base_url(); ?>assets/notiflix-2.7.0/dist/notiflix-2.7.0.min.js"></script>
</head>

<body onload="startTime()">
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- Loader ends-->