<?php include('template/header.php'); ?>
  <div class="container mt-5 p-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/updatevendor') ?>">
    <h4 class="text-center"><u> Update User</u></h4>
      <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
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
        <label>ID Number</label>
        <input type="text" name="id_no" class="form-control" value="<?php echo $user_obj['id_no']; ?>">
      </div>
      <div class="form-group mb-3">
        <label >User name:</label>
      <input type="text" name="username"  value="<?php echo $user_obj['username']; ?>" class="form-control">
       </div>
      <div class="form-group col-12">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="<?php echo $user_obj['location']; ?>">
      </div>
      <div class="form-group col-12">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>">
      </div>
      <div class="form-group col-12">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="<?php echo $user_obj['phone']; ?>">
      </div>
      
      <div class="form-group col-12">
        <button type="submit" class="btn btn-success float-end">Save Data</button>
      </div>
      </div>
    </form>
  </div>
  