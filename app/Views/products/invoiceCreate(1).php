<?php include('template/header.php');?>
<form class="container mt-5 py-5" method="post" id="invoice_create" name="invoice_create" 
    action="<?php echo site_url('submit-invoice'); ?>">
  <div class="form-row mt-2 p-3 m-2 bg-light">
   	<div class="col-8">
   	<div class="col-7 mb-4">
    <label for="vendor">VENDOR</label>
    <select class="form-control" id="vendor" name="vendor">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group col-7 mb-4 ">
    <label for="address"> ADDRESS</label>
    <textarea class="form-control" id="address" rows="5" name="address"></textarea>
   	</div>
   	<div class="col-7 mb-4">
    <label for="vendor">TERMS</label>
    <select class="form-control" id="terms" name="terms">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
   </div>
   <div class="col-4">
   	<div class="col-12">
    	<label for="date">DATE</label>
    	<input type="date" class="form-control" id="date" placeholder="date" name="date">
    </div>
    <div class="col-12">
    <label for="date">REF No.</label>
     <input type="text" class="form-control" placeholder="Ref No" name="ref">
    </div>
    <div class="col-12">
    <label for="date">AMOUNT DUE.</label>
     <input type="text" class="form-control" placeholder="amountdue" name="amountdue">
    </div>
    <div class="col-12">
    <label for="date">BILL DUE</label>
     <input type="date" class="form-control" placeholder="billdue" name="billdue">
    </div>
</div>
<div class="col-12">
    <label for="date">MEMO</label>
     <input type="text" class="form-control" name="memo">
    </div>
  <div class="form-row">
  	<table class="table table-striped bg-light" id="inventory-create mt-5">
		<table class="table table-bordered table-responsive-md table-striped text-center ">
        <thead>
          <tr>
            <th class="text-center">ACCOUNT</th>
            <th class="text-center">AMOUNT</th>
            <th class="text-center">MEMO</th>
            <th class="text-center">CUSTOMER JOB</th>
            <th class="text-center">BILLABLE AMOUNT</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
    		<td>
   				  <input type="text" class="form-control" name="account">
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="amount">
    		</td>
    		<td>
   				  <input type="text" class="form-control" name="memo">
   				 
			</td>
    		<td>
    			<input type="text" class="form-control" name="customerjob">
    		</td>
    		<td>
    			<input type="text" class="form-control" name="billamount">
    		</td>
    	</tr>

    </tbody>
</table>
<button type="submit" class="btn btn-primary float-end">Create</button>
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
  
    </script>
  
    
</div>
