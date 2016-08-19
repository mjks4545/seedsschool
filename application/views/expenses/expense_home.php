
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Dashboard
            <small><a href="<?= site_url()?>admin/">Home</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Expenses Home
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
                          <p>Add Expense </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <a href="<?= site_url()?>expenses/addexpenses" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                   <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>...</h3>
                          <p>View Expenses</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-male" aria-hidden="true"></i>
                        </div>
                          <a href="<?= site_url()?>expenses/viewexpenses" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->


                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>...</h3>
                                <p>Search Expenses</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-male" aria-hidden="true"></i>
                            </div>
                            <a href="<?= site_url()?>expenses/search_expenses" class="small-box-footer">
                                Click here  <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->


                </div><!-- /.row -->
                  
              </div>
            </div>
          </div><!-- /.box -->
              
        </section>
</div>
              

