<?php
 $session = \Config\Services::session();

<<<<<<< HEAD
//  $man = session()->get('datsss');
// echo '<pre>';
// print_r($man);
// exit;

if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container mt-5 pt-3'>

<!-- *******************************************************************************  -->

<div class='container  '>
<div class="d-flex justify-content-end">
  </div>
  <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>";

=======
<div class='container mt-5 pt-3'>



<!-- *******************************************************************************  -->

<div class='container mt-5'>
<h5><u>Delivery Notes</u></h5>
<table class="table">
  <thead>
    <tr>
      <th>Name</th>
      <th>Account</th>
      <th>Customerjob</th>
      <th>Bill Amount</th>
      <th>Bill due</th>
      <th></th>
    </tr>
  </thead>
  <?php if($invoicecreate): ?>
    <?php foreach($invoicecreate as $user):?>
  <tbody>
    <tr>
      <td class="pt-4-half" contenteditable="true"><?=  $user['vendor']; ?></td>
      <td class="pt-3-half" contenteditable="true"><?=  $user['account']; ?></td>
      <td class="pt-3-half" contenteditable="true"><?=  $user['customerjob']; ?></td>
      <td class="pt-3-half" contenteditable="true"><?=  $user['billamount']; ?></td>
      <td class="pt-3-half" contenteditable="true"><?=  $user['billdue']; ?></td>
      <td class="pt-3-half">
        <a href="ProductsCrud/moreList/<?php echo $user['id'];?>" class="btn btn-info btn-sm">View</a>
        <a href="<?= base_url('ProductsCrud/deleteDeliverynote/'. $user['id']) ?>" class="btn btn-danger">Delete</a> 
      </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
</div>


    <script type="text/javascript">
      
    if ($("invoice_create").length > 0) {
      $("#invoice_create").validate({
        rules: {
          vendor: {
            required: true,
          },
          address: {
            required: true,
            maxlength: 60,,
          },
          terms:{
            required: true,
          }
          ref:{
            required: true,
          }
          amountdue:{
            required: true,
          }
          billdue:{
            required: true,
          }
          memo:{
            required: true,
          }
          account:{
            required: true,
          }
          customerjob:{
            required: true,
          }
          billamount:{
            required: true,
          }

        },
        messages: {
          vendor: {
            required: "vendor is required.",
          },
          address: {
            required: "address is required.",
          },
          terms: {
            required: "terms is required.",
          },
          date: {
            required: "date is required.",
          },
          ref: {
            required: "ref is required.",
          },
          amountdue: {
            required: "amountdue is required.",
          },
          billdue: {
            required: "billdue is required.",
          },
          memo: {
            required: "memo is required.",
          },
          account: {
            required: "account is required.",
          },
          customerjob: {
            required: "customerjob is required.",
          },
          billamount: {
            required: "billamount is required.",
          },

        },
      })
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
    }
?> 
 
<<<<<<< HEAD
<h5 class="text-center"><u>Delivery Notes</u></h5>
<div class="">
<a href="<?php echo site_url('stockt-view') ?>" class="btn btn-outline-dark btn-sm bi bi-chevron-left">back</a>

<?php if($user_data == 'admin'): ?>
<a href="<?php echo site_url('home-view') ?>" class="btn btn-outline-warning btn-sm ">Home</a>
  <?php endif; ?>
<a href="<?php echo base_url('/ProductsCrud/delv') ?>" class="btn btn-outline-success btn-sm ">Create new</a>
            <form class="d-flex float-end">
                <input class="form-control me-2" name="q" placeholder="Search" aria-label="Search">
                <button class="btn btn-light" type="submit">Search </button>
            </form>
        </div>
        <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:60%'>

  <thead>
    <tr>
      <th>User Name</th>
      <th>Note no.</th>
      <th>Served by</th>
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

          <td class="pt-2-half" ><?=  $user->username; ?></td>
            <td class="pt-2-half" ><?=  $user->delvnote; ?></td>
            <td class="pt-2-half" ><?=  $user->user_name; ?></td>
            <td class="pt-3-half" ><?=  $datereceived; ?></td>
            <td class="pt-3-half" ><?=  $user->document; ?></td>
            <td class="pt-3-half">

            <div class="input-group col-sm-12 col-lg-6 col-md-10">
            <a href="<?= base_url('Settings/fetchdeliveryspre/'. $user->ref) ?>" class=" btn btn-outline-success me-2 bi bi-file-earmark-spreadsheet btn-sm"></a>
              <a href="<?= base_url('ProductsCrud/fetchdelivery/'. $user->document) ?>" class="btn btn-outline-light me-2 btn-sm bi bi-eye"></a>
                <?php if($user_data == 'manager' && $datereceived == date("Y-m-d")): ?>
                <a href="<?= base_url('ProductsCrud/editdelivery/'. $user->ref) ?>" class="btn btn-outline-warning me-2 btn-sm bi bi-pencil-square"></a>
                <?php elseif($user_data != 'manager'): ?>
                <a href="<?= base_url('ProductsCrud/editdelivery/'. $user->ref) ?>" class="btn btn-outline-warning me-2 btn-sm bi bi-pencil-square"></a>
                <?php else:  ?>
              <?php endif; ?>
              <?php if($user_data == 'admin'): ?>
              <a href="<?= base_url('ProductsCrud/deleteDeliverynote/'.$user->ref) ?>" class=" btn btn-outline-danger me-2 bi bi-trash-fill btn-sm"  ></a>
              <?php endif; ?>
            </div>

            </td>
       </tr>
  </tbody>
  <?php endforeach; ?>
    <?php endif; ?>
</table>
</div>


=======
$(function(){
 
$('select').editableSelect();
 
});

 
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
  
