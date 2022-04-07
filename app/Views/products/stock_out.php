<?php include('template/header.php');?>
    <div class='container' style="margin-top: 5rem; border-radius: 1rem">
    <a href="<?php echo site_url('/delivery-create') ?>" class="small-box-footer">
    <button class='btn btn-warning float-end'>Delivery Note</button>
    </a>
    <h5><u>Stock out</u></h5>

    <div id="table" class="table-editable">
      <table class="table" id="inventory-view mt-5">
        <thead>
          <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Type</th>
            <th class="text-center">Condition</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Unique ID</th>
            <th class="text-center"></th>
          </tr>
        </thead>
         </tbody> 
      </table>
    </div>
    </div>