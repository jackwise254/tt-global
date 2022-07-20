<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); 

?>

 <div class="container mt-5 pt-5">
 <h5 class="text-center"><u> Speed</u></h5>

 <form name="test" action="<?php echo  base_url('Settings/Speed'); ?>" method="POST">
    <a href="<?php echo base_url('ProductsCrud/Setting') ?>" class="btn btn-dark btn-sm bi bi-chevron-left">back</a>
    
    <label class=''>Speed</label>
     <input class=' ' type="text" id="speed" name="speed" required>
    <button type ="submit" class=" btn btn-success btn-sm" id="myBtn" onchange="this.form.submit()">Submit</button>

    </form>
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded shadow">
                <div class="table-responsive">
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:50%'>
                        <thead >
                            <tr>
                            <th  scope="col" class="col-3"></th>
                            <th scope="col" class="col-3">Speed</th>
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

                              <a href="<?= base_url('Settings/deletep/'.$user->id);?>" class="btn-submit bi bi-file-x-fill btn btn-danger btn-sm"></a>

                            </div>
                            </td>
                            </td>
                            <td class="col-3"><?=  $user->speed; ?></td>
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
 