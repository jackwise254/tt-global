<?php if($user_data == 'admin'): 

include('template/header.php');

else:
    include('template/head.php');

endif;

?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style type="text/css">
	body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
</style>
<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #111-222
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    
    			
               <input type="hidden" name="id" id="id" value="<?php echo $masterlist['id']; ?>">
                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">Name:</div>
                        <td class="pt-3-half py-25 mr-4" contenteditable="true"><?php echo $masterlist['type']; ?></td>
                        <div class="d-none d-sm-block col-4 col-sm-2 ">Asset Id:</div>
                        <div class="d-none d-sm-block col-sm-2"><?php echo $masterlist['assetid']; ?></div>
                    </div>

                    <div class="text-95 text-secondary-d3">
                    	<div class="row mb-2 mb-sm-0 py-25">
                    		<div class="d-none d-sm-block col-1">1</div>
                            <div class="col-9 col-sm-5">SCREEN:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['screen']; ?></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                        	<div class="d-none d-sm-block col-1">2</div>
                            <div class="col-9 col-sm-5">CONDITION:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['conditions']; ?></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1">3</div>
                            <div class="col-9 col-sm-5">GENERATION:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['gen']; ?></div>
                        </div>

                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">4</div>
                            <div class="col-9 col-sm-5">RAM:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['ram']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 ">
                            <div class="d-none d-sm-block col-1">5</div>
                            <div class="col-9 col-sm-5">PART:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['part']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">5</div>
                            <div class="col-9 col-sm-5">SERIAL NO.:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['serialno']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 ">
                            <div class="d-none d-sm-block col-1">6</div>
                            <div class="col-9 col-sm-5">MODEL ID:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['modelid']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">7</div>
                            <div class="col-9 col-sm-5">CPU:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['cpu']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 ">
                            <div class="d-none d-sm-block col-1">8</div>
                            <div class="col-9 col-sm-5">SPEED:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['speed']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">9</div>
                            <div class="col-9 col-sm-5">PRICE:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['price']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 ">
                            <div class="d-none d-sm-block col-1">10</div>
                            <div class="col-9 col-sm-5">ODD:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['odd']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">11</div>
                            <div class="col-9 col-sm-5">COMMENT:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['comment']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 ">
                            <div class="d-none d-sm-block col-1">12</div>
                            <div class="col-9 col-sm-5">HDD:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['hdd']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">13</div>
                            <div class="col-9 col-sm-5">DATE RECIEVED:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['daterecieved']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 ">
                            <div class="d-none d-sm-block col-1">14</div>
                            <div class="col-9 col-sm-5">DATE DELIVERED:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['datedelivered']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">15</div>
                            <div class="col-9 col-sm-5">CUSTOMER:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['customer']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 ">
                            <div class="d-none d-sm-block col-1">16</div>
                            <div class="col-9 col-sm-5">LIST:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['list']; ?></div>
                        </div>
                        <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                            <div class="d-none d-sm-block col-1">17</div>
                            <div class="col-9 col-sm-5">STATUS:</div>
                            <div class="d-none d-sm-block col-2"><?php echo $masterlist['status']; ?></div>
                        </div>
                 </div>
             </div>
         </div>


<?php include('template/footer.php');?>