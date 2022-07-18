<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
</br>
</br>

<div class="container bg-light mt-5 pt-5">
   <h5 class="text-center"> <u>Drop down list</u></h5>
   <a href="<?php echo site_url('home-view') ?>" class="btn btn-success btn-sm bi bi-chevron-left px-5">back</a>

<?php
    if(session()->getFlashdata('status')) {
        echo "<h5 class=' alert alert-success d-flex align-items-center bi flex-shrink-0 me-2' width='18' height='18' role='alert' style='font-family:'Airal', Arial, Arial; font-size:50%'>" . session()->getFlashdata('status') . "</h5>"; 
    }
?> 
    
<div class="row mt-2 py-4 px-5 ">
<div class="col-2">
<a href="<?php echo base_url('Settings/conditionl') ?>" class="btn btn-primary btn-sm ">Condition</a>
</div>
<div class="col-2">
<a href="<?php echo base_url('Settings/typel') ?>" class="btn btn-warning btn-sm ">Type</a>
</div>

<div class="col-2">

<a href="<?php echo base_url('Settings/brandl') ?>" class="btn btn-success btn-sm ">Brand</a>
</div>

<div class="col-2">
    
<a href="<?php echo base_url('Settings/genl') ?>" class="btn btn-primary btn-sm ">Gen</a>
</div>


<div class="col-2">

<a href="<?php echo base_url('Settings/cpul') ?>" class="btn btn-warning btn-sm ">Cpu</a>
</div>

<div class="col-2">

<a href="<?php echo base_url('Settings/speedl') ?>" class="btn btn-success btn-sm ">Speed</a>
</div>

    
</div>
<div class="row mt-3 px-5 md-4">
<div class="col-2">
   
<a href="<?php echo base_url('Settings/raml') ?>" class="btn btn-primary btn-sm ">Ram</a>
</div>

<div class="col-2">

<a href="<?php echo base_url('Settings/hddl') ?>" class="btn btn-warning btn-sm ">Hdd</a>
</div>

<div class="col-2 mb-5">

<a href="<?php echo base_url('Settings/screenl') ?>" class="btn btn-success btn-sm ">Screen</a>
   
</div>
</div>
</div>

 </div>
</div>
</div>