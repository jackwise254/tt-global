<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container mt-5 pt-3'>

<!-- *******************************************************************************  -->

<div class='container mt-5 '>

  <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>";

    }
?>  
<h5 class="text-center"><u>Verification page</u></h5>
<table class="table table-responsive-md table-striped text-center">
  <thead>
    <tr>
      <th>Date</th>
      <th>Ref No:</th>
      <th>Created by:</th>
      <th>Memo:</th>

      <th>Document</th>

      <th></th>
    </tr>
  </thead>
  <?php if($invoicecreate): ?>
    <?php foreach($invoicecreate as $user):
      $datereceived = substr($user->date,0,10);
      
      ?>
  <tbody>
    <tr>
      <td class="pt-3-half" ><?=  $datereceived; ?></td>
      <td class="pt-3-half" ><?=  $user->ref; ?></td>
      <td class="pt-3-half" ><?=  $user->session; ?></td>
      <td class="pt-3-half" ><?=  $user->memo; ?></td>

      <td class="pt-3-half" ><?=  $user->document; ?></td>

      <td class="pt-3-half">
      <a href="<?= base_url('Settings/verifiedspre/'. $user->ref) ?>" class=" btn btn-success bi bi-file-earmark-spreadsheet btn-sm"></a>

        <a href="<?= base_url('ProductsCrud/summary/'. $user->document) ?>" class="btn btn-light btn-sm bi bi-eye"></a>
        <a href="<?= base_url('ProductsCrud/deleteve/'. $user->document) ?>" class="btn btn-danger bi bi-file-x-fill btn-sm"></a> 
      </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
</div>


  
