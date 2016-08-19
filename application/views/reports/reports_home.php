
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Dashboard
            <small>
              <a href="<?php echo site_url()?>admin/">Admin</a>
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
              Reports Home
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
                          <p>Daily Reports </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="<?= site_url()?>reports/dailyreports" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                   <!--<div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                     <!-- <div class="small-box bg-green">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Weekly Reports</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male" aria-hidden="true"></i>
                        </div>
                          <a href="<?/*= site_url()*/?>reports/weeklyreports" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>--
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Monthly Reports</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-suitcase" aria-hidden="true"></i></div>
                          <a href="<?= site_url()?>reports/monthlyreports" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Yearly Reports </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="<?= site_url()?>reports/yearlyReports" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                  </div>
                  
                   
                  </div>
                </div><!-- /.box -->
              </div>
            </div>
        </section>
    </div>
              

