<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>TT GLOBAL</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <div class="container"> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('/products-list') ?>">>>Products</a>
        </li>
      </ul>
    </div>
</nav>
  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
     action="<?= site_url('/update-products') ?>">
     <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
     <div class="form-group">
     
 <div class="container mt-7">
  <form>
    <div class="form-row">
  <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
      <label>Asset Id</label>
      <input type="text" name="assetid" value="<?php echo $user_obj['assetid']; ?>" class="form-control">
   <!-- </div> -->
 </div>
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>Part</label>
        <input type="text" name="part" value="<?php echo $user_obj['part']; ?>" class="form-control">
     </div> <!-- </div> -->
    </div>
     <div class="form-row">
  <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
      <label>Model Id</label>
      <input type="text" name="modelid" value="<?php echo $user_obj['modelid']; ?>" class="form-control">
   <!-- </div> -->
 </div>
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>Serial No.</label>
        <input type="text" name="serialno" value="<?php echo $user_obj['serialno']; ?>" class="form-control">
     </div> <!-- </div> -->
    </div>
    <div class="form-group">
        <label>CPU</label>
        <input type="text" name="cpu" value="<?php echo $user_obj['cpu']; ?>" class="form-control">
      </div> 
<div class="form-row">
    <div class="col-4 mb-3">
      <label>Condition</label>
        <select class="form-select" value="<?php echo $user_obj['conditions']; ?>" name="conditions">
          <option selected>Select</option>
          <option value="New">New</option>
          <option value="Used">Used</option>
          <option value="Fubished">Fubished</option>
        </select>
    </div>

    <div class="col-md-3 mb-4">
      <label>TYPE</label>
        <select class="form-select" value="<?php echo $user_obj['type']; ?>" name="type">
          <option selected>Select</option>
          <option value="New">Laptop</option>
          <option value="Used">Desktop</option>
          <!-- <option value="Fubished">Fubished</option> -->
        </select>
    </div>
    <div class="col-md-4 mb-5">
      <label>GENERATION</label>
        <select class="form-select" value="<?php echo $user_obj['gen']; ?>"  name="gen">
          <option selected>Select</option>
          <option value="New">8 th</option>
          <option value="Used">9 th</option>
          <option value="Used">10 th</option>
          <option value="Used">11 th</option>
          <option value="Fubished">7 th</option>
        </select>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="form-group">
        <label>CUSTOMER</label>
        <input type="text" name="customer" value="<?php echo $user_obj['customer']; ?>" class="form-control">
      </div>
    <div class="row">
       <div class="col-2 mb-4">
      <label>RAM</label>
        <select class="form-select" value="<?php echo $user_obj['ram']; ?>"   name="ram">
          <option selected>Select </option>
          <option value="New">2 GB</option>
          <option value="Used">4 GB</option>
          <option value="Used">8 GB</option>
          <option value="Fubished">12 GB</option>
        </select>
    </div>
    <div class="col-3 mb-5">
      <label>SCREEN</label>
        <select class="form-select" value="<?php echo $user_obj['screen']; ?>"   name="screen">
          <option selected>Select </option>
          <option value="New">10'</option>
          <option value="Used">11'</option>
          <option value="Used">14'</option>
          <option value="Fubished">15'</option>
        </select>
    </div>
    <div class="col-3 mb-8">
      <div class="form-group">
      <label>ODD</label>
        <select class="form-select" value="<?php echo $user_obj['odd']; ?>"   name="odd">
          <option selected>Select </option>
          <option value="New">OLD</option>
          <option value="Used">NEW</option>
          <option value="Fubished">Furbish</option>
        </select>
      </div>
    </div>
    </div>
    <div class="form-group">
        <label>HDD</label>
        <input type="text" name="hdd" value="<?php echo $user_obj['hdd']; ?>" class="form-control">
      </div>
   <div class="form-group">
        <label>SPEED</label>
        <input type="text" name="speed" value="<?php echo $user_obj['speed']; ?>" class="form-control">
      </div>
       <div class="form-row">
  <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
      <label>Price</label>
      <input type="text" name="price" value="<?php echo $user_obj['price']; ?>" class="form-control">
   <!-- </div> -->
 </div>
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>LIST</label>
        <input type="text" name="list" value="<?php echo $user_obj['list']; ?>" class="form-control">
     </div> <!-- </div> -->
    </div>
     <div class="form-row">
  <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
      <label>Date Recieved</label>
      <input type="text" name="daterecieved" value="<?php echo $user_obj['daterecieved']; ?>" class="form-control">
   <!-- </div> -->
 </div>
   <!-- <div class="form-group"> -->
    <div class="col-6 mb-3">
        <label>Date Delivered</label>
        <input type="text" name="datedelivered" value="<?php echo $user_obj['datedelivered']; ?>" class="form-control">
     </div> <!-- </div> -->
    </div>
  </div>
     <div class="form-group">
        <label>Comment</label>
        <input type="text" name="comment" class="form-control">
      </div>
    </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
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
          assetid: {
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
          assetid: {
            required: "assetide is required.",
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
<?php include("footer.php"); ?>
