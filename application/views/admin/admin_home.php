
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Director Dashboard
            <small>Home</small>
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
                          <p>Academic Section </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="<?= site_url()?>academic/index" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                   <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Teachers Details</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male" aria-hidden="true"></i>
                        </div>
                          <a href="<?= site_url()?>teacher/index" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Visitors Details</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>                        </div>
                          <a href="<?= site_url()?>visitor/index" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    
                 </div><!-- /.row -->
               <!-- for new row-->
                  <div class="row">
                      <div class="col-lg-1 col-xs-4"></div>
                      <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-green">
                              <div class="inner">
                                  <h3>...</h3>
                                  <p>Reception</p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-desktop" aria-hidden="true"></i>
                              </div>
                              <a href="<?= site_url()?>reception/index" class="small-box-footer">
                                  Click here  <i class="fa fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div><!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-orange">
                              <div class="inner">
                                  <h3>...</h3>
                                  <p>Gate Keeper</p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-street-view" aria-hidden="true"></i>                              </div>
                              <a href="<?= site_url()?>gatekeeper/index" class="small-box-footer">
                                  Click here  <i class="fa fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div><!-- ./col -->
                      <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                              <div class="inner">
                                  <h3>...</h3>
                                  <p>Other Staff</p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-street-view" aria-hidden="true"></i>                              </div>
                              <a href="<?= site_url()?>otherstaff/index" class="small-box-footer">
                                  Click here  <i class="fa fa-arrow-circle-right"></i>
                              </a>
                          </div>
                      </div><!-- ./col -->
                    </div>
                    <div class="row">
                    <div class="col-lg-1 col-xs-4"></div>
                      <div class="col-lg-3 col-xs-6">
                          <!-- small box -->
                          <div class="small-box bg-aqua">
                              <div class="inner">
                                  <h3>...</h3>
                                  <p>Expenses</p>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-street-view" aria-hidden="true"></i>                              </div>
                               <a href="<?= site_url()?>expenses/index" class="small-box-footer">
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
              

