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
        <a class="nav-link text-dark" href="<?php echo site_url('/inventory-view') ?>">Masterlist</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/stock-view') ?>">Stock in</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/delivery-create') ?>">Stock out</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/invoice-page') ?>">Invoice</a>
        <a class="nav-link text-dark" href="<?php echo site_url('/warranty') ?>">Warranty</a>
        <button class='btn btn-danger'><a href="<?php echo base_url('Login/logout') ?>" class="fa fa-user text-light" > Logout</a></button>
      </div>
    </div>
  </div>
</nav>

