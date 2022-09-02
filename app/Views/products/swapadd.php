<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container mt-5 pt-4 col-12'>
<div class='container col-12'>
  <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>";

    }
?>  
<div class="">
<h5 class="text-center"><u>Replacements</u></h5>
<?php if($user_data == 'admin'): ?>
    <a href="<?php echo site_url('home-view') ?>" class="btn btn-warning btn-sm">Home</a>
<?php endif; ?>
    <a href="<?php echo site_url('/warrantyout') ?>" class="btn btn-dark btn-sm bi bi-chevron-left">Back</a>
    <a href="<?php echo base_url('Settings/swapcreat') ?>" class="btn btn-warning btn-sm ">Create new</a>

      <form class="d-flex float-end">
          <input class="form-control " name="q" placeholder="Search" aria-label="Search">
          <button class="btn btn-light btn-sm" type="submit">Search </button>
      </form>
  </div>
<table class="table table-responsive-md table-striped text-center">
  <thead>
  <tr>
      <th>User Name</th>
      <th>Reference no.</th>
      <th>Warranty No.</th>
      <th>Phone</th>
      <th>Served by</th>
      <th>Date</th>
      <th>Document</th>
      <th></th>
    </tr>
  </thead>
    <?php foreach($invoicecreate as $user):
      $datereceived = substr($user->date,0,10);
        ?>
  <tbody>
    <tr>
    <td class="pt-4-half" ><?=  $user->username; ?></td>
      <td class="pt-4-half" ><?=  $user->warranty; ?></td>
      <td class="pt-4-half" ><?=  $user->wnote; ?></td>
      <td class="pt-4-half" ><?=  $user->phone; ?></td>
      <td class="pt-4-half" ><?=  $user->user_name; ?></td>
      <td class="pt-3-half" ><?=  $datereceived; ?></td>
      <td class="pt-3-half" ><?=  $user->document; ?></td>
      <td class="pt-3-half">

      <a href="<?= base_url('Settings/fetchwarrantyspre/'. $user->ref) ?>" class=" btn btn-success bi bi-file-earmark-spreadsheet btn-sm"></a>
          <?php if($user_data == 'warranty' && $datereceived == date("Y-m-d")): ?>
            <a href="<?= base_url('ProductsCrud/fetchwarranty/'. $user->ref) ?>" class="btn btn-light btn-sm bi bi-eye"></a>
             <?php elseif($user_data != 'warranty'): ?>
                  <a href="<?= base_url('ProductsCrud/fetchwarranty/'. $user->ref) ?>" class="btn btn-light btn-sm bi bi-eye"></a>
                <?php else:  ?>
              <?php endif; ?>
        <a href="<?= base_url('ProductsCrud/editwarranty1/'. $user->ref) ?>" class="btn btn-warning btn-sm bi bi-pencil-square"></a>
        <?php if($user_data == 'admin'): ?>
    <a href="<?= base_url('ProductsCrud/deletewarranty/'. $user->ref) ?>" class="trigger-btn btn btn-danger bi bi-trash-fill btn-sm" ></a>
  <?php endif; ?>

      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>


  
