<?php include("template/header.php"); ?>
<div class="container-xxl">
<div class="container mt-4">
   <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th scope="col">User Id</th>
             <th scope="col">Name</th>
             <th scope="col">Email</th>
             <th scope="col">Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
             <td scope="row"><?php echo $user['id']; ?></td>
             <td scope="row"><?php echo $user['name']; ?></td>
             <td scope="row"><?php echo $user['email']; ?></td>
             <td scope="row">
              <a href="<?php echo base_url('edit-view/'.$user['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('delete/'.$user['id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
     <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/user-form') ?>" class="btn btn-success mb-2">Add User</a>
  </div>
  </div>
</div>
</div>
<?php include("template/footer.php"); ?>