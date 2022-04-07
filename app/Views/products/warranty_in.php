<?php include('template/header.php');?>
   <?php
    $session = session();
    $names = $session->get('user_name');
?>
<div class='container mt-5'>
<h5 style="margin-top: 5rem; border-radius: 1rem"><strong><u>Stock on Warranty<ul></strong> </h5>
<div class="">
<a href="<?php echo site_url('ProductsCrud/wload'); ?>" class="btn btn-success mb-4 bi bi-file-plus-fill"></a>
<table class="table">
        <thead>
          <tr>
            <th class="text-center">Condition</th>
            <th class="text-center">Type</th>
            <th class="text-center">Generation</th>
            <th class="text-center">Ram</th>
            <th class="text-center">Screen</th>
            <th class="text-center">Part</th>
            <th class="text-center">Comment</th>
            <th class="text-center">Date Recieved</th>
            <th class="text-center">Customer</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <?php if($masterlist): ?>
          <?php foreach($masterlist as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $user['conditions']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['type']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['gen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['ram']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['screen']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['part']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['comment']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['daterecieved']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['customer']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['status']; ?></td>
            <td class="pt-3-half">
              
            <a href="<?php echo site_url('ProductsCrud/deletes'); ?>" class="btn-submit mb-4 bi bi-file-x-fill btn btn-danger"></a>
            <a href="<?php echo site_url('ProductsCrud/updates'); ?>" class="btn btn-warning mb-4 bi bi-pencil-square"></a>
            </td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>
</div>