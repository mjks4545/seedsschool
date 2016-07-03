
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small>Teacher</small>
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
                                    <p>Add New Teacher</p>
                                </div>
                                <div class="icon">
                                    <i class="fa ion-person-add"></i>
                                </div>
                                <a href="<?= site_url()?>teacher/addTeacher" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>View Teacher</p>
                                </div>
                                <div class="icon">
                                    <i class="fa ion-person-add"></i>
                                </div>
                                <a href="<?= site_url()?>teacher/viewteacher" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>...</h3>

                                    <p> New Attendence </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                                <a href="<?= site_url() ?>teacher/teachernewattendance" class="small-box-footer">
                                    Click here <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow-active">
                                <div class="inner">
                                    <h3>...</h3>

                                    <p>Today Attendance </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                                <a href="<?= site_url() ?>teacher/todayattendance" class="small-box-footer">
                                    Click here <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-black">
                                <div class="inner">
                                    <h3>...</h3>

                                    <p>Attendance Details</p>
                                </div>
                                <div class="icon" style="color:#ffffff; ">
                                    <i class="fa fa-table" aria-hidden="true"></i>
                                </div>
                                <a href="<?= site_url() ?>teacher/teacher_attendance_detail" class="small-box-footer">
                                    Click here <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                    
                </div>
            </div><!-- /.box -->
        </div>
</div>
</section>
</div>

