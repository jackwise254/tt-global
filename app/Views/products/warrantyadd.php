<<<<<<< HEAD
<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>

<div class='container mt-5 pt-3'>

<!-- *******************************************************************************  -->

<div class='container mt-5 '>
<div class="d-flex ">

  </div>
  <?php
    if(session()->getFlashdata('status')) {
        echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>";

    }
?>  
<div class="">
<h5 class="text-center"><u>Warranty Notes</u></h5>
<?php if($user_data == 'admin'): ?>
<a href="<?php echo site_url('home-view') ?>" class="btn btn-warning btn-sm">Home</a>
  <?php endif; ?>
<a href="<?php echo site_url('/warrantyout') ?>" class="btn btn-dark btn-sm bi bi-chevron-left">Back</a>
<a href="<?php echo site_url('/warrant') ?>" class="btn btn-warning btn-sm ">Create new</a>

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
        <a href="<?= base_url('ProductsCrud/fetchwarranty/'. $user->ref) ?>" class="btn btn-light btn-sm bi bi-eye"></a>
        <a href="<?= base_url('ProductsCrud/editwarranty1/'. $user->ref) ?>" class="btn btn-warning btn-sm bi bi-pencil-square"></a>
        <?php if($user_data == 'admin'): ?>
    <a href="<?= base_url('ProductsCrud/deletewarranty/'. $user->ref) ?>" class="trigger-btn btn btn-danger bi bi-trash-fill btn-sm" ></a>
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
                      <a href="<?= base_url('ProductsCrud/deletewarranty/'. $user->ref) ?> " class="btn btn-danger deletebtn" >Delete</a>

                      </div>
                      </div>
                      </div>
                      </div>
    <?php endforeach; ?>
  </tbody>
</table>
</div>


  
=======
<?php include("template/header.php"); ?>
<br/><br/>
<body class="bg-light py-5">
   
  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" 
    action="<?= base_url('ProductsCrud/ WarrantyAdd') ?>">
      <div class="form-group">
    <?php
    
    ?> 
 <div class="container mt-7">
  <form>
    <div class="form-row">
        <div class="col-5 mb-3">
            <label>Part</label>
            <input type="text" name="part" class="form-control">
        </div> 
   
    <div class="col-4 mb-3">
        <label>Serial No.</label>
        <input type="text" name="serialno" class="form-control">
     </div>
</div><!-- </div> -->
    <!-- </div> -->
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
          <option value="latpop">Laptop</option>
          <option value="Desktop">Desktop</option>
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
          <option value="7th">7 th</option>
        </select>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="form-group">
        <label>CUSTOMER NAME</label>
        <input type="text" name="customer" class="form-control">
      </div>
    <div class="row">
       <div class="col-2 mb-4">
      <label>RAM</label>
        <select class="form-select"  name="ram">
          <option selected>Select </option>
          <option value="2GB">2 GB</option>
          <option value="4GB">4 GB</option>
          <option value="8GB">8 GB</option>
          <option value="12GB">12 GB</option>
        </select>
    </div>
    <div class="col-3 mb-5">
      <label>SCREEN</label>
        <select class="form-select"  name="screen">
          <option selected>Select </option>
          <option value="10'">10'</option>
          <option value="11'">11'</option>
          <option value="14'">14'</option>
          <option value="15'">15'</option>
        </select>
    </div>
    <div class="col-3 mb-8">
      <div class="form-group">
      <label>ODD</label>
        <select class="form-select"  name="odd">
          <option selected>Select </option>
          <option value="New">OLD</option>
          <option value="Used">NEW</option>
          <option value="Fubished">Furbish</option>
        </select>
      </div>
    </div>
    <div class="form-group col-3 mb-8">
        <label>Quantity</label>
        <input type="text" name="qty" class="form-control">
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
      <input type="text" name="price" class="form-control">
      <div class="col-6 mb-3">
      <label>Date Delivered</label>
      <input type="date" name="datedelivered" class="form-control">
   <!-- </div> -->
 </div>
  
    <div class="col-6 mb-3">
        <label>LIST</label>
        <input type="text" name="list" class="form-control">
     </div> <!-- </div> -->
    </div>
     <div class="form-row">
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
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
