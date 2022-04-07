<?php include('template/header.php'); ?>
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
  