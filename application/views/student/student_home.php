<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small> <a href="<?= site_url()?>academic/">Academic Section </a> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Student Home</small>
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
                    </div><!-- /.box-header -->
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Add New Student</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <a href="<?= site_url()?>student/addstudent" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>View Students Details</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </div>
                                <a href="<?= site_url()?>student/viewstudents" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Attendance</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-table" aria-hidden="true"></i>
                                </div>
                                <a href="<?= site_url()?>studentattendance/allcourse" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
     <!--------------------for 2nd row----------------------------->
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow-active">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Student Payment</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                                <a href="<?= site_url()?>studentpayment/viewstd" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                      </div><!-- ./row-->
                </div>
            </div><!-- /.box -->
        </div>
</div>
</section>
</div>


