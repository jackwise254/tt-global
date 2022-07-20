<?php include('template/header.php');?>
     <br/> <br/> <br/>
    <div class="content-header text-center">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-md-6 offsset-md-3">
            <h1 class="m-0">STOCK OUT</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>150</h3>

                <p>Delivery note</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo site_url('/delivery-create') ?>" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- <div class="col-md-4">
            <a href="<?php echo site_url('/stockt-view') ?>">
            <div class="small-box bg-secondary p-2">
              <div class="inner">
                <h3>150</h3>
                <p>SALES</p>
              </div>
              <div class="icon">
                <i class="ion ion-speedometer"></i>
              </div>
              <a href="<?php echo site_url('/stockt-view') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i>Stock out</a>
            </div>
          </div>
          </a>
        </div> -->
      </div>
    </section>
          
<?php include('template/footer.php');?>