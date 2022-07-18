<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>TT GLOBAL</title>
  </head>
  <body>
      
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">TT GLOBAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
      
    </div>
  </div>
</nav>
<body>
<div class="container">
<div class="row justify-content-md-center">
<div class="col-6">
<h1>Sign Up</h1>
<?php if(isset($validation)):?>
<div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif;?>
<form action="<?php echo base_url(); ?>/register/save" method="post">
<div class="mb-3">
<label for="InputForName" class="form-label">Name</label>
<input type="text" name="name" class="form-control" id="InputForName" value="">
</div>
<div class="mb-3">
<label for="InputForEmail" class="form-label">Email address</label>
<input type="email" name="email" class="form-control" id="InputForEmail" value="">
</div>
<div class="mb-3">
<label for="InputForPassword" class="form-label">Password</label>
<input type="password" name="password" class="form-control" id="InputForPassword">
</div>
<div class="mb-3">
<label for="InputForConfPassword" class="form-label">Confirm Password</label>
<input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
</div>
<button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
</div>
</div>
</body>
</html> 


