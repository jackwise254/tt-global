<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<?php include('inc/db_connect.php'); 

?>

<div class="py-2 mt-2">
  
      <div class="my-3">
       </div>
 <div class="container mt-5 pt-5">
     <h5 class="text-center"><u>Logs panel</u></h5>
        <div class=" form-row">
            <div class="col-sm-12 mx-auto bg-light rounded ">
            <a href="<?php echo site_url('home-view') ?>" class="btn btn-success btn-sm bi bi-chevron-left">back</a>

<form class="d-flex float-end">
    <input class="form-control me-2" name="q" placeholder="Search" aria-label="Search">
    <button class="btn btn-info" type="submit">Search </button>
</form>
</div>

<?php
if(session()->getFlashdata('status')) {
  echo "<h4 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='24' height='24' role='alert' style='font-family:'Airal', Arial, Arial; font-size:60%'>" . session()->getFlashdata('status') . "</h4>"; 
}
?>  
                <div class="table-responsive">
                    <table class="table table-fixed table-striped " style='font-family:"Airal", Arial, Arial; font-size:60%'>
                        <thead >
                            <tr>
                            <th scope="col" class="col-3">First Name</th>
                            <th scope="col" class="col-3 ">Last Name</th>
                            <th scope="col" class="col-3">Designation</th>
                            <th scope="col" class="col-3 px-5">Action</th>
                            <th scope="col" class="col-3 px-5">Date</th>
                            </tr>
                        </thead>
                        <?php if($masterlist): ?>
                        <?php foreach($masterlist as $user):
                          $datereceived = substr($user->time,0,10);
                          ?>
                        <tbody>
                            <tr>
                            <td class="col-3"><?=  $user->fname; ?></td>
                            <td class="col-3"><?=  $user->lname; ?></td>
                            <td class="col-3"><?=  $user->designation; ?></td>
                            <td class="col-10"><?=  $user->action; ?></td>
                            <td class="col-3"><?=  $user->time; ?></td>
                            </tr>
                        </tbody>


                      <?php endforeach; ?>
                      <?php endif; ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <script type='text/javascript'></script>
</body>

 

