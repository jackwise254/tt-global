<?php include('template/header.php'); ?>

<br/><br/>
     
     <div class="container p-5">
       <h4 class="text-center"><u >Staff List </u></h4>
       <a href="<?php echo site_url('/home-view') ?>" class="btn btn-dark btn-sm bi bi-chevron-left">back</a>

        <a href="<?php echo site_url('/user-form') ?>" class="btn btn-success bi-plus btn-sm">Add Staff</a>
       <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class='alert alert-success'>" . session()->getFlashdata('status') . "</h4>";
    }
?>
       
     <table class="table table-bordered table-responsive-md table-striped text-center py-5">
        <thead>
          <tr>
          <th class="text-center">First name</th>
          <th class="text-center">Last name</th>
          <th class="text-center">User name</th>
          <th class="text-center">Role</th>
          <th class="text-center">Email</th>
          <th class="text-center">Action</th>
          </tr>
        </thead>
        <?php if($users): ?>
          <?php foreach($users as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" ><?=  $user['fname']; ?></td>
            <td class="pt-3-half" ><?=  $user['lname']; ?></td>
            <td class="pt-3-half" ><?=  $user['user_name']; ?></td>
            <td class="pt-3-half" ><?=  $user['designation']; ?></td>
            <td class="pt-3-half" ><?=  $user['user_email']; ?></td>
            <td class="pt-3-half">
            <a href="<?= base_url('UserCrud/singleUser/'.$user['user_id']) ?>" class="btn btn-warning bi bi-pencil-square"></a>
            
              <a href="UserCrud/delete/<?php echo $user['user_id'];?>" class="btn-submit bi bi-file-x-fill btn btn-danger"></a>
            </td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>
      
              
     </div>
     
