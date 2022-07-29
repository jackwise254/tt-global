<?php include('template/header.php'); ?>
<br/><br/>
<div class="container p-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2 class="text-center"> <u> Add Staff </u></h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form method="post" id="add_create" name="add_create" action="<?= base_url('Register/save') ?>">
                   <div class="form-group mb-3">

                    <input type="text" name="fname" placeholder="first name"  class="form-control">
                    </div>
                    <div class="form-group mb-3">

                    <input type="text" name="lname" placeholder="last name"  class="form-control">
                    </div>
                    <div class="form-group mb-3">

                    <input type="text" name="username" placeholder="User name"  class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control"name="designation" id="designation">
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="sales">Sales</option>
                            <option value="technician">Technician</option>
                            <option value="warranty">Warranty</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="verification">Verification manager</option>
                        </select>

                    <!-- <input type="text" name="designation" placeholder="Role"  class="form-control"> -->
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email"  placeholder="email" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="password" class="form-control" >
                    </div>
                    <!-- <div class="form-group mb-3">
                        <input type="password" name="confpassword" placeholder="Confirm Password" class="form-control" >
                    </div> -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php include('template/header.php'); ?>