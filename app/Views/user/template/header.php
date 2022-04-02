<!DOCTYPE html>
<html>
<head>
  <title>TT GLOBAL</title>
 <style type="text/css">
  .footer {
  padding: 60px 15px 0;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
}
</style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="http://coderszine.com/wp-content/themes/v2/cz.png">
</head>
<body class="bg-ligt">
<nav class="navbar navbar-expand-lg navbar-light bg-secondary text-light">
  <div class="container">
    <a class="navbar-brand img-circle" href="<?php echo site_url('/home-view') ?>">
    <img src="dist/img/logo.jpeg" width="40" height="40" alt="">
  </a>
  <a class="navbar-brand text-light" href="<?php echo site_url('/home-view') ?>"><strong>TT GLOBAL</strong></a>
  <ul class="navbar-nav mr-auto">
  <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo site_url('/inventory-view') ?>">Inventory</a>
</li>
      <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo site_url('/stock-view') ?>">Stock in</a>
      </li>
     <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo site_url('/stockt-view') ?>">Stock out</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo site_url('/invoice-page') ?>">Invoice</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo site_url('/warranty') ?>">Warranty</a>
      </li>
    </ul>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="ms-auto float-end">
      <a href="<?php echo site_url('/signin') ?>" class="fa fa-user text-light" > Logout</a>
    </div>
  </div>
  </div>
</nav>

