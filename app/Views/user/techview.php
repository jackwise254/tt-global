<?php include('template/header.php');?>
<div class='container mt-5 pt-5 w-75 mb-5'>
    <div class="row">
        <h4><u>Repaire Item: <?php echo $masterlist['assetid']; ?> </u></h4>
        <div class="col-md-5">
        <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h6 class="card-title"><u>Machine ID: <?php echo $masterlist['assetid']; ?></u></h6>
            <div class="row">
                <div class="col">
                    <p>Type: <?php echo $masterlist['type']; ?></p>
                    <p>Condition: <?php echo $masterlist['conditions']; ?></p>
                    <p>Generation: <?php echo $masterlist['gen']; ?></p>
                    <p>RAM: <?php echo $masterlist['ram']; ?></p>
                    <p>CPU Speed: <?php echo $masterlist['speed']; ?></p>
                    <p>CPU: <?php echo $masterlist['cpu']; ?></p>
                    <p>Storage: <?php echo $masterlist['hdd']; ?></p>
                    <p>Date Sold: <?php echo $masterlist['daterecieved']; ?></p>
                    <p>Screen size: <?php echo $masterlist['screen']; ?></p>
                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="col-md-7">
            <form class="form-group" action="">
            <label class='form-label'><u>Select spare</u></label>
                <select class="form-select" name="status">
                    <option selected>Select</option>
                    <option value="Fixable">Fixable</option>
                    <option value="Fixed">Fixed</option>
                    <option value="Faulty">Faulty</option>
                </select>
                <button class='btn btn-success mt-2'>Add spare</button>
            </form>

            <table class="table" id="inventory-view mt-5">
            <p><u>Spares Used</u></p>
            <hr>
            <thead>
            <tr>
                <th class="text-center">Date</th>
                <th class="text-center">Item</th>
                <th class="text-center">Condition</th>
                <th class="text-center">Quantity</th>
            </tr>
            </thead>
            </tbody> 
        </table>

        <form class="form-group" action="">
        <label class='form-label'><u>Add Comment</u></label>
        <textarea name="techcomment" id="techcomment" cols="10" rows="6" class='form-control'></textarea>    
        <button class='btn btn-success mt-2'>Add Comment</button>
        </form>

        </div>
    </div>

</div>
        