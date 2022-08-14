<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container mt-5 pt-4 col-11'>

    <!-- *******************************************************************************  -->
    <div class='container col-11 '>
        <?php
    if(session()->getFlashdata('status')) {
        echo "<h5 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='18' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>" . session()->getFlashdata('status') . "</h5>";

    }
?>
</div>
        <div class="">
        <h5 class="text-center"><u>Faulty Notes</u></h5>
<a href="<?php echo site_url('fualty-out') ?>" class="btn btn-dark btn-sm bi bi-chevron-left">back</a>
        <?php if($user_data == 'admin'): ?>
<a href="<?php echo site_url('home-view') ?>" class="btn btn-warning btn-sm">home</a>
  <?php endif; ?>
  
        <a href="<?php echo site_url('/fualty-note') ?>" class="btn btn-success btn btn-sm">Create new</a>
            <form class="d-flex float-end">
                <input class="form-control me-2" name="q" placeholder="Search" aria-label="Search">
                <button class="btn btn-light btn-sm" type="submit">Search </button>
            </form>
        </div>
        <table class="table table-responsive-md table-striped text-center">
            <thead>
                <tr>
      <th>User Name</th>
      <th>Faulty No</th>
      <th>Refference No</th>
      <th>Phone</th>
      <th>Date</th>
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

    <td class="pt-4-half" ><?=  $user->username; ?></td>
    <td class="pt-4-half" ><?=  $user->	faultyn; ?></td>
    <td class="pt-4-half" ><?=  $user->faulty; ?></td>
      <td class="pt-4-half" ><?=  $user->phone; ?></td>
      <td class="pt-3-half" ><?=  $datereceived; ?></td>
      <td class="pt-3-half" ><?=  $user->document; ?></td>
                    <td class="pt-3-half">
                    <a href="<?= base_url('Settings/fetchfaultyspre/'. $user->ref) ?>" class=" btn btn-success bi bi-file-earmark-spreadsheet btn-sm"></a>
                        <a href="<?= base_url('ProductsCrud/fetchdebit/'. $user->ref) ?>"
                            class="btn btn-light btn-sm bi bi-eye"></a>
                            <a href="<?= base_url('ProductsCrud/editfaultyouts/'. $user->ref) ?>" class="btn btn-warning btn-sm bi bi-pencil-square"></a>
                            <?php if($user_data == 'admin'): ?>
                <a href="<?= base_url('ProductsCrud/deletefaultynote/'. $user->ref) ?>" class="btn btn-danger bi bi-trash-fill btn-sm" ></a>
                <?php endif; ?>

                    </td>
                </tr>
<!-- Modal HTML -->
                      <div id="myModal" class="modal fade">
                      <div class="modal-dialog modal-confirm">
                      <div class="modal-content">
                      <div class="modal-header flex-column">
                      <div class="icon-box">
                      <i class="material-icons">&#xE5CD;</i>
                      </div>
                      <h4 class="modal-title w-100">Are you sure?</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body">
                      <p>Do you really want to delete these records? This process cannot be undone.</p>
                      </div>
                      <div class="modal-footer justify-content-center">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <a href="<?= base_url('ProductsCrud/deletefaultynote/'. $user->ref) ?> " class="btn btn-danger deletebtn" >Delete</a>

                      </div>
                      </div>
                      </div>
                      </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>