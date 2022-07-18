<!DOCTYPE html>
<html>
<head>
  <title>TT GLOBAL</title>
<<<<<<< HEAD
  <link rel="stylesheet" href="links\bootstrap\css\bootstrap.min.css">
  <link rel="stylesheet" href="links\cdnjs\fontawesome.min.css">
  <link rel="stylesheet" href="links\Lato\Lato-Regular.ttf">
  <link rel="stylesheet" href="links\ionicons-2.0.1\css\ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="links\package\css\font-awesome.min.css">
  <link rel="stylesheet" href="links\jquery\package\dist\jquery.slim.min.js">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  


    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }
        
        
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        
      
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        
        
        
        .modal-confirm .btn-secondary:hover,
        .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }
        
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        
        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
     
    </style>






=======
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
</head>
<body class="bg-ligt">

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
<<<<<<< HEAD
  <a class="navbar-brand" href="<?php echo site_url('/home-view') ?>"> <span><img src="dist/img/logo.png" width="85" height="40" alt=""></span> </a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
=======
    <a class="navbar-brand" href="<?php echo site_url('/home-view') ?>"> <span><img src="dist/img/logo.jpeg" width="60" height="35" alt=""></span> TT Global</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
<<<<<<< HEAD
      <a class="nav-link text-dark " style="font-family: arial, arial, arial; font-size: 11px "  href="<?php echo site_url('/verify') ?>">Stock verification</a>
      <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/fualty-stock') ?>">Faulty in</a>
      <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/fualty-out') ?>">Faulty Out</a>
       <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/reports') ?>">Reports</a>
        <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/stock-view') ?>">Stock in</a>
        <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/stockt-view') ?>">Stock out</a>
        <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/invoice-page') ?>">Invoice</a>
        <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/warranty') ?>">Warranty In</a>
        <a class="nav-link text-dark" style="font-family: arial, arial, arial; font-size: 11px" href="<?php echo site_url('/warrantyout') ?>">Warranty out</a>
        <button class='btn btn-danger' style="font-family: arial, arial, arial; font-size: 11px"><a href="<?php echo base_url('Login/logout') ?>" class="fa fa-user text-light" > Logout</a></button>
=======
        <a class="nav-link text-dark" href="<?php echo site_url('/inventory-view') ?>">Masterlist</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/stock-view') ?>">Stock in</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/delivery-create') ?>">Stock out</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/invoice-page') ?>">Invoice</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/warranty') ?>">Warranty</a>
        <button class='btn btn-danger'><a href="<?php echo base_url('Login/logout') ?>" class="fa fa-user text-light" > Logout</a></button>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
      </div>
    </div>
  </div>
</nav>

