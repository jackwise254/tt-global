<?php include('template/header.php'); ?>
<br/><br/>
<div class="container w-50 p-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2 class="text-center"> <u> Add Customer</u></h2>
                
                </div>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form method="post" id="add_create" name="add_create" action="<?= base_url('Vendor/csave') ?>">
                   <div class="form-group mb-3">

                    <input type="text" name="fname" placeholder="first name"  class="form-control">
                    </div>
                    <div class="form-group mb-3">

                    <input type="text" name="lname" placeholder="last name"  class="form-control">
                    </div>
                    <div class="form-group mb-3">

                    <input type="number" name="phone" placeholder="phone number"  class="form-control">
                    </div>

                    <div class="form-group mb-3">

                    <input type="text" name="id_no" placeholder="ID number"  class="form-control">
                    </div>

                    <div class="form-group mb-3">

                    <input type="text" name="username" placeholder="user name"  class="form-control">
                    </div>
                    <div class="form-group mb-3">
                    <input type="text" name="location" placeholder="location"  class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email"  placeholder="email" class="form-control" >
                    </div>
                   <div class="d-grid">
                        <button type="submit" class="btn btn-success">Add customer</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php include('template/header.php'); ?>