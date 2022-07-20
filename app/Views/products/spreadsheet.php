<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container mt-5 pt-3'>

<!-- *******************************************************************************  -->

<div class='container mt-5 '>
<div class="d-flex justify-content-end">
        <a href="<?php echo base_url('/ProductsCrud/delv') ?>" class="btn btn-success  mb-4">Create new</a>
  </div>
  <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>";

    }
?>  
<h5 class="text-center"><u>Exports</u></h5>
<table class="table table-responsive-md table-striped text-center">
  <thead>
    <tr>
      <th>Number</th>
      <th>Date</th>
      <th>Name</th>
      <th></th>
    </tr>
  </thead>
  <?php if($invoicecreate): ?>
    <?php foreach($invoicecreate as $user):?>
  <tbody>
    <tr>
      <td class="pt-4-half" ><?=  $user->id; ?></td>
      <td class="pt-3-half" ><?=  $user->date; ?></td>
      <td class="pt-3-half" ><?=  $user->ref; ?></td>
      <td class="pt-3-half">
        <a href="<?= base_url('ProductsCrud/fetchspreadsheet/'. $user->ref) ?>" class="btn btn-light btn-sm bi bi-eye"></a>
        <a href="<?= base_url('ProductsCrud/deleteSp/'. $user->id) ?>" class="btn btn-danger bi bi-file-x-fill btn-sm"></a> 
      </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
</div>


  
