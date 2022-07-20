<?php include('template/header.php'); ?>

<br/><br/>
     
     <div class="container px-2 pt-5">
       <h4 class="text-center"><u >Vendor List</u></h4>
       <a href="<?php echo site_url('/home-view') ?>" class="btn btn-light btn-sm bi bi-chevron-left"></a>
     <table class="table table-responsive-md table-striped text-center py-5">
        <thead>
          <tr>
          <th class="text-center">First name</th>
          <th class="text-center">Last name</th>
          <th class="text-center">User name</th>
          <th class="text-center">ID Number</th>
          <th class="text-center">Location</th>
          <th class="text-center">Phone</th>
          <th class="text-center">User name </th>
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
            <td class="pt-3-half" ><?=  $user['username']; ?></td>
            <td class="pt-3-half" ><?=  $user['id_no']; ?></td>
            <td class="pt-3-half" ><?=  $user['location']; ?></td>
            <td class="pt-3-half" ><?=  $user['phone']; ?></td>
            <td class="pt-3-half" ><?=  $user['username']; ?></td>
            <td class="pt-3-half" ><?=  $user['email']; ?></td>
            <td class="pt-3-half">
            <a href="Vendor/singleUser/<?php echo $user['id'];?>" class="btn btn-warning bi bi-pencil-square btn-sm"></a>
              <a href="Vendor/delete/<?php echo $user['id'];?>" class="btn-submit bi bi-file-x-fill btn btn-danger btn-sm"></a>
            </td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/vendor-form') ?>" class="btn btn-success bi-plus mb-4">Add Vendor</a>
       </tr>
  </div>
              
     </div>
     
