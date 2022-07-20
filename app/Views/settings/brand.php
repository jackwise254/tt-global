<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); 

?>

<div class="py-2 mt-2">
  

 <div class="container mt-5 pt-5">
 <h5 class="text-center"><u> Brands</u></h5>
<form name="test" action="<?php echo  base_url('Settings/Brand'); ?>" method="POST">
<a href="<?php echo base_url('ProductsCrud/Setting') ?>" class="btn btn-dark btn-sm bi bi-chevron-left">back</a>
    <label class=''>Brand</label>
     <input type="text" class=" " id="brand" name="brand" required>
    <button type ="submit" class="  btn btn-success btn-sm" id="myBtn" onchange="this.form.submit()">Submit</button>
    </form>
            <div class="col-sm-12 mx-auto bg-light rounded  ">
                <div class="table-responsive">
                    <table class="table table-fixed table-striped table-center " style='font-family:"Airal", Arial, Arial; font-size:50%'>
                        <thead >
                            <tr>
                            <th  scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">Brand</th>
                            <th scope="col" class="col-3">Created at</th>
                            </tr>
                        </thead>
                        <?php if($masterlist): ?>
                        <?php foreach($masterlist as $user):
                          $datereceived = substr($user->date,0,10);
                          ?>
                        <tbody>
                            <tr>
                            <td class="">  
                              <div class="btn-group" role="group" aria-label="Basic example">

                              <a href="<?= base_url('Settings/deleteb/'.$user->id);?>" class="btn-submit bi bi-file-x-fill btn btn-danger btn-sm"></a>

                            </div>
                            </td>
                            <td class="col-3"><?=  $user->brand; ?></td>
                            <td cclass="col-3"><?=  $datereceived; ?></td>
                            </tr>
                        </tbody>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

