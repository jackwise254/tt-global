<?php include("template/header.php"); ?>
<br/><br/>
<body class="bg-light py-5">
   
  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" 
    action="<?= site_url('/submit-products') ?>">
      <div class="form-group">
    <?php
    
    ?> 
 <div class="container mt-7">
  <form>
    <div class="form-row">
  <!-- <div class="form-group"> -->
    
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>Part</label>
        <input type="text" name="part" class="form-control">
     </div> <!-- </div> -->
    </div>
     <div class="form-row">
  <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
      <label>Model Id</label>
      <input type="text" name="modelid" class="form-control">
   <!-- </div> -->
 </div>
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>Serial No.</label>
        <input type="text" name="serialno" class="form-control">
     </div> <!-- </div> -->
    </div>
    <div class="form-group">
        <label>CPU</label>
        <input type="text" name="cpu" class="form-control">
      </div> 
<div class="form-row">
    <div class="col-4 mb-3">
      <label>Condition</label>
        <select class="form-select"  name="conditions">
          <option selected>Select</option>
          <option value="New">New</option>
          <option value="Used">Used</option>
          <option value="Fubished">Refurb</option>
        </select>
    </div>

    <div class="col-md-3 mb-4">
      <label>TYPE</label>
        <select class="form-select" name="type">
          <option selected>Select</option>
          <option value="laptop">Laptop</option>
          <option value="desktop">Desktop</option>
          <!-- <option value="Fubished">Fubished</option> -->
        </select>
    </div>
    <div class="col-md-4 mb-5">
      <label>GENERATION</label>
        <select class="form-select" name="gen">
          <option selected>Select</option>
          <option value="8th">8 th</option>
          <option value="9th">9 th</option>
          <option value="10th">10 th</option>
          <option value="11th">11 th</option>
        </select>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="form-group">
        <label>CUSTOMER</label>
        <input type="text" name="customer" class="form-control">
      </div>
    <div class="row">
       <div class="col-2 mb-4">
      <label>RAM</label>
        <select class="form-select"  name="ram">
          <option selected>Select </option>
          <option value="2">2 GB</option>
          <option value="4">4 GB</option>
          <option value="8">8 GB</option>
          <option value="12">12 GB</option>
        </select>
    </div>
    <div class="col-3 mb-5">
      <label>SCREEN</label>
        <select class="form-select"  name="screen">
          <option selected>Select </option>
          <option value="10">10'</option>
          <option value="11">11'</option>
          <option value="14">14'</option>
          <option value="15">15'</option>
        </select>
    </div>
    <div class="col-3 mb-8">
      <div class="form-group">
      <label>ODD</label>
        <select class="form-select"  name="odd">
          <option selected>Select </option>
          <option value="old">OLD</option>
          <option value="new">NEW</option>
          <option value="refab">Refab</option>
        </select>
      </div>
    </div>
    <div class="form-group col-3 mb-8">
        <label>Quantity</label>
        <input type="number" name="qty" class="form-control">
      </div>
    </div>
    <div class="form-group">
        <label>HDD</label>
        <input type="text" name="hdd" class="form-control">
      </div>
   <div class="form-group">
        <label>SPEED</label>
        <input type="text" name="speed" class="form-control">
      </div>
       <div class="form-row">
  <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
      <label>Price</label>
      <input type="number" name="price" class="form-control">
   <!-- </div> -->
 </div>
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>LIST</label>
        <input type="text" name="list" class="form-control">
     </div> <!-- </div> -->
    </div>
     <div class="form-row">
  <!-- <div class="form-group"> -->
   
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>Date Delivered</label>
        <input type="date" name="datedelivered" class="form-control">
     </div> <!-- </div> -->
    </div>
  </div>
     <div class="form-group">
        <label>Comment</label>
        <input type="text" name="comment" class="form-control">
      </div>
    </div>
    
      <div class="form-group">
        <button type="submit" id="generateBarcode" name="generateBarcode" class="btn btn-success form-control" value="Generate barcode">Save</button>
      </div>
    </form>
    
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          condtions: {
            required: true,
          },
           type: {
            required: true,
          },
         
          gen: {
            required: true,
          },
          ram: {
            required: true,
          },
          screen: {
            required: true,
          },
          odd: {
            required: true,
          },                                          
          comment: {
            required: true,
            maxlength: 120,
          },
        },
        messages: {
          condtions: {
            required: "condtion is required.",
          },
          type: {
            required: "type is required.",
          },
          
           gen: {
            required: "gen is required.",
          },
          screen: {
            required: "screen is required.",
          },
          odd: {
            required: "odd is required.",
          },
          name: {
            required: "Name is required.",
          },
          comment: {
            required: "comment is required.",
          },

        },
      })
    }
  </script>

</body>
</html>