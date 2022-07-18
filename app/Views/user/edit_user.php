<?php include('template/header.php'); ?>
<<<<<<< HEAD
<br/><br/>
<div class="container p-5">

        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2 class="text-center"> <u> Edit Staff </u></h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form method="post" id="update_user" autocomplete="off" name="update_user" 
                 action="<?= base_url('Register/update/'. $user_obj['user_id']) ?> ">
                   <div class="form-group mb-3">
                   <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_obj['user_id']; ?>">
                   <label class="py-2">First name:</label>
                    <input type="text" name="fname"  value="<?php echo $user_obj['fname']; ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                    <label >Last name:</label>
                    <input type="text" name="lname"  value="<?php echo $user_obj['lname']; ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                    <label >User name:</label>
                    <input type="text" name="username"  value="<?php echo $user_obj['user_name']; ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                    <label >Designation:</label>
                        <select class="form-control"name="designation" value="<?php echo $user_obj['designation']; ?>" id="designation">
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="sales">Sales</option>
                            <option value="technician">Technician</option>
                            <option value="warranty">Warranty</option>
                            <option value="superadmin">Super Admin</option>
                        </select>

                    <!-- <input type="text" name="designation" placeholder="Role"  class="form-control"> -->
                    </div>
                    <div class="form-group mb-3">
                    <label >Email:</label>
                        <input type="email" name="email"   value="<?php echo $user_obj['user_email']; ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                    <label >Password:</label>
                        <input type="password" name="password" autocomplete="off" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning">Edit user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php include('template/header.php'); ?>
=======
  <div class="container mt-5 p-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update') ?>">
    <h4 class="text-center"><u> Update User</u></h4>
      <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_obj['user_id']; ?>">
      <div class="container col-md-6 offset-3 pb-5"> 
      <div class="form-group col-12">
      <label>First name</label> 
        <input type="text" name="fname" class="form-control" value="<?php echo $user_obj['fname']; ?>">
      </div>
      <div class="form-group col-12">
        <label>Last name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $user_obj['lname']; ?>">
      </div>
      <div class="form-group col-12">
        <label>User name</label>
        <input type="text" name="user_name" class="form-control" value="<?php echo $user_obj['user_name']; ?>">
      </div>
      <div class="form-group col-12">
        <label>Email</label>
        <input type="email" name="user_email" class="form-control" value="<?php echo $user_obj['user_email']; ?>">
      </div>
      <div class="form-group col-12">
        <label>Designation</label>
        <input type="text" name="designation" class="form-control" value="<?php echo $user_obj['designation']; ?>">
      </div>
      <div class="form-group col-12">
        <label>Password</label>
        <input type="password" name="user_password" class="form-control" value="<?php echo $user_obj['user_email']; ?>">
      </div>
      <div class="form-group col-12">
        <button type="submit" class="btn btn-success float-end">Save Data</button>
      </div>
      </div>
    </form>
  </div>
  
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
