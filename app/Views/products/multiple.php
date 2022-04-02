<?php include('template/header.php');?>
<form class="container mt-5 py-5" method="post" id="invoice_create" name="invoice_create" 
    action="<?php echo base_url('ProductsCrud/multiples'); ?>">
  <div class="form-row mt-2 p-3 m-2 bg-light">
    <div class="col-12">
     <div class="container mt-7">
  <form>
    <div class="form-row">
  <!-- <div class="form-group"> -->
    <div class="col-2 mb-3">
      <label>Vendor</label>
      <input type="text" name="vendor" class="form-control" placeholder="Name:">
   <!-- </div> -->
 </div>
   <!-- <div class="form-group"> -->
    <div class="col-2 mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" placeholder="phone">
     </div> <!-- </div> -->
    
    <div class="col-2 mb-3">
      <label>Address</label>
      <input type="text" name="modelid" class="form-control" placeholder="address">
   </div>
   <div class="col-2 mb-3">
      <label>Location</label>
      <input type="text" name="modelid" class="form-control" placeholder="location">
   </div>
   <div class="col-2">
    <div class="col-12">
      <label for="date">DATE</label>
      <input type="date" class="form-control" id="date" placeholder="date" name="date">
    </div>
  </div>
   
  <div class="form-row">
    <table class="table table-striped bg-light" id="inventory-create mt-5">
    <table class="table table-bordered table-responsive-md table-striped text-center ">
        <thead>
          <tr>
            <th class="text-center">CONDITION</th>
            <th class="text-center">TYPE</th>
            <th class="text-center">SCREEN</th>
            <th class="text-center">HDD</th>
            <th class="text-center">QUANTITY</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <input type="text" class="form-control" name="conditions" placeholder="conditions">
           
      </td>
        <td>
          <input type="text" class="form-control" name="type" placeholder="type">
        </td>
        <td>
            <input type="text" class="form-control" name="screen" placeholder="screen">
           
      </td>
        <td>
          <input type="text" class="form-control" name="hdd" placeholder="hdd">
        </td>
        <td>
          <input type="text" class="form-control" name="qty" placeholder="Quantity">
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
