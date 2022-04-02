<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>TT GLOBAL</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="name" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="email" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> -->



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
<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>