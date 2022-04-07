<?php include('template/header.php');?>

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
    }
  
 
$(function(){
 
$('select').editableSelect();
 
});

 
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
