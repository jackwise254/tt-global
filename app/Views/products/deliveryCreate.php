<?php include('template/header.php');?>

<form class="container mt-5 py-5" method="post" id="delivery_create" name="delivery_create" 
    action="<?php echo base_url('/ProductsCrud/deliveryCreate'); ?>">
    <br/><br/>
      <h4><u>Create a delivery note </u></h4>
  <div class="form-row mt-2 p-2 m-2 bg-light">

   	<div class="col-8">
   	<div class="col-7 mb-4">
  
<?php if($invoicecreate): ?>
  <label for="vendor">CUSTOMER</label>
    <input type="text" name="vendor" class="form-control" list="vendor"/>
    <datalist id="vendor">
      <?php if(isset($_GET['customer'])): ?>
      <option value="<?=  $invoicecreate['customer']; ?>">
        <?php endif; ?>
      </datalist>
  </div>
  <div class="form-group col-7 mb-4 ">
    <label for="address"> ADDRESS</label>
    <textarea class="form-control" id="address" rows="5" name="address"></textarea>
   	</div>
   	<div class="col-7 mb-4">
    <label for="vendor">TERMS</label>
    <input type="text" name="terms" class="form-control" list="terms"/>
    <datalist id="terms">
      <?php if(isset($_GET['terms'])): ?>
      <option value="<?=  $invoicecreate['terms']; ?>">
        <option value="<?=  $invoicecreate['terms']; ?>">
          <?php endif; ?>
      </datalist>
  </div>
   </div>
   <div class="col-4">
   	<div class="col-12">
    	<label for="date">DATE</label>
    	<input type="date" class="form-control ui-select" id="date" placeholder="date" name="date">
    </div>
    <div class="col-12">
    <label for="date">REF No.</label>
     <input type="text" class="form-control ui-select" placeholder="Ref No" name="ref">
    </div>
    <div class="col-12">
    <label for="date">AMOUNT DUE.</label>
     <input type="text" class="form-control ui-select" placeholder="amountdue" name="amountdue">
    </div>
    <div class="col-12">
    <label for="date">BILL DUE</label>
     <input type="date" class="form-control ui-select" placeholder="billdue" name="billdue">
    </div>
    <div class="col-12">
      <label>Account</label>
      <input type="text" name="account" class="form-control">
   
 </div>
    <?php endif; ?>
    
</div>
  <button type="submit" class="btn btn-primary float-end">Create</button>
  	<table class="table table-bordered table-responsive-md table-striped text-center py-3">
        <thead>
          <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Account</th>
            <th class="text-center">Customerjob</th>
            <th class="text-center">Bill Amount</th>
            <th class="text-center">Bill due</th>
          </tr>
        </thead>
        <?php if($invoicecreate): ?>
          <?php foreach($invoicecreate as $user):?>
        <tbody>
          <tr>
            <td class="pt-4-half" contenteditable="true"><?=  $user['customer']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['account']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['customerjob']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['billamount']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['billdue']; ?></td>
            <td class="pt-3-half">
              <a href="ProductsCrud/moreList/<?php echo $user['id'];?>" class="btn btn-danger btn-sm">View</a>
            </td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>

  </div>
</form>
<?php include('template/footer.php');?>
<div class="form-row">
    
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
    
  
    
</div>
