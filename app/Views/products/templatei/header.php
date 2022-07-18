<!DOCTYPE html>
<html>
<head>
  <title>TT GLOBAL</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   


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






</head>
<body class="bg-ligt">

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('/home-view') ?>"> <span><img src="dist/img/logo.jpeg" width="60" height="35" alt=""></span> TT Global</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
      <a class="nav-link text-dark" href="<?php echo site_url('/verify') ?>">Stock verification</a>
      <a class="nav-link text-dark" href="<?php echo site_url('/fualty-stock') ?>">Faulty</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/stock-view') ?>">Inventory</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/stock-view') ?>">Stock in</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/stockt-view') ?>">Stock out</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/invoice-page') ?>">Invoice</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/warranty') ?>">Warranty In</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/warrantyout') ?>">Warranty out</a>
        <button class='btn btn-danger'><a href="<?php echo base_url('Login/logout') ?>" class="fa fa-user text-light" > Logout</a></button>
      </div>
    </div>
  </div>
</nav>

