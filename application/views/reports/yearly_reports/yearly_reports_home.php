
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Dashboard
            <small>
              <a href="<?php echo site_url()?>admin/">Admin</a>
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
              <a href="<?php echo site_url()?>reports/">Reports</a>
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
              Weekly Reports Home
            </small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                    <?php $this->load->view('include/alert'); ?>
                </div><!-- /.box-header -->
                <div class="row">
                    <div class="col-lg-1 col-xs-4"></div>
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Visitor Reports </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="<?= site_url()?>reports/yearlyvisitors" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                   <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Students Reports</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male" aria-hidden="true"></i>
                        </div>
                          <a href="<?= site_url()?>reports/yearlyStudent" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Profit & Loss Reports</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-suitcase" aria-hidden="true"></i></div>
                          <a href="<?= site_url()?>reports/yearlyfinance" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    
                 </div>
                                   
                  </div>
                </div><!-- /.box -->
              </div><!-- /.row -->

             <div class="row" style="background-color:#fff;"><!-- 2nd /.row -->
            
                <div class="row">
                    <div class="col-lg-1 col-xs-4"></div>
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Students Teacher wise Report </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="<?= site_url()?>reports/yearly_teacherwisestudent" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    
                 </div>
                   
              </div><!-- /.row -->
        </section>
    </div>
              

