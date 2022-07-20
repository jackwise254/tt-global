<?php 
include('template/heads.php');

?>
<div class='container mt-5 pt-5'>
<div class='container '>
  <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>";
    }
?>  
<div class="container col-md-12 col-sm-12">
 
  <h5 class="text-center "><u>Barcode generation</u></h5>
  <form class="form-group" action="<?= site_url('barcodesimport') ?>" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
      <input class="form-control w-25 d-inline" required type="file" name="file"id="file" accept=".csv">
      <button type="submit" id="submit" name="import" class="btn-submit btn btn-success bi bi-upload"> </button>
  </form>
</div>
<table class="table table-responsive-md table-striped text-center " style='font-family:"Airal", Arial, Arial; font-size:60%'>
  <thead>
    <tr>
      <th>Description</th>
      <th>Created by:</th>
      <th>Date:</th>
      <th></th>
    </tr>
  </thead>
  <?php if($items): ?>
    <?php foreach($items as $user):
      $datereceived = substr($user['created_at'],0,10);
      ?>
  <tbody>
    <tr>
      <td class="pt-3-half" ><?=  $user['description']; ?></td>
      <td class="pt-3-half" ><?=  $user['session']; ?></td>
      <td class="pt-3-half" ><?=  $datereceived; ?></td>

      <td class="pt-3-half">
      <a href="<?= base_url('Settings/verifiedspre/'. $user->ref) ?>" class=" btn btn-success bi bi-file-earmark-spreadsheet btn-sm"></a>

        <!-- <a href="<?= base_url('ProductsCrud/summary/'. $user->document) ?>" class="btn btn-light btn-sm bi bi-eye"></a> -->
        <!-- <a href="<?= base_url('ProductsCrud/deleteve/'. $user->document) ?>" class="btn btn-danger bi bi-file-x-fill btn-sm"></a>  -->
      </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
</div>


  
