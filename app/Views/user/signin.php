
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
    <div class="container mt-5 bg-ligt col offsset-3" >
    <div class="container mt-5  ">
        <div class="row justify-content-md-center">
            <div class="col-5 bg-ligt ">
                
                <h2  class="text-center">Login in</h2>
                
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <form  action="<?php echo base_url(); ?>/UserController/login" method="post">
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    
                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Signin</button>
                    </div>     
                </form>
            </div>
              
        </div>
    </div>
  </body>
</div>
</html>


