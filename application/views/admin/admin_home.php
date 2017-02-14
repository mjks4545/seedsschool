<?php
$session = $this->session->userdata('session_data');
$id = $session['id'];
$role = $session['role']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <span class="text-capitalize"><?= $role; ?></span>
            Dashboard
            <small>Home</small>
        </h1>
        <a href="<?=  site_url()?>admin/add_auto_montly_fee" class="btn btn-primary pull-right">Add Monthly Fee</a>
        <a href="<?=  site_url()?>admin/send_daily_reports" class="btn btn-primary pull-right">Daily Reports</a>
        <br><br><br>
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
                    </div>
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>
 

                        <?php if ($role == "admin" || $role == "director" ) { ?>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Visitors Details</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?= site_url() ?>visitor/index" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        <?php } ?>
                        <?php if ( $role == "admin" || $role == "director" ) { ?>
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
                                    <a href="<?= site_url() ?>teacher/viewteacher" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        <?php } ?>
                        <?php if ($role == "admin" || $role == "director" ) { ?>
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
                                    <a href="<?= site_url() ?>academic/index" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        <?php } ?>
                        <?php if ($role == "admin" || $role == "director" ) { ?>
                    </div>
                    <!-- /.row -->
                    <!-- for new row-->
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>
                        <?php } ?>
                        <?php if ($role == "admin" || $role == "director" ) { ?>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Other Staff</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-street-view" aria-hidden="true"></i></div>
                                    <a href="<?= site_url() ?>otherstaff/index" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        <?php } ?>
                        <?php if ($role == "admin" || $role == "director" ) { ?>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Finance Section</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <a href="<?= site_url() ?>finance/" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        <?php } ?>
                        <?php if ( $role == "admin" || $role == "director" ) { ?>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Student Section</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <a href="<?= site_url() ?>student/" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            
                             <!-- ./col -->
                        <?php } ?>
                         <?php if ( $role == "teacher") { ?>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Attendance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <a href="<?= site_url() ?>teacher/take_teacher_attendance/" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            
                             <!-- ./col -->
                        <?php } ?>
                        <?php if ( $role == "teacher") { ?>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Teacher detail</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <a href="<?= site_url() ?>teacher/viewteacherdetails/<?php echo $id;?>" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            
                             <!-- ./col -->
                        <?php } ?>

                        <?php if ( $role == "admin" || $role == "director" ) { ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>
                        <?php }
                        if ($role == "admin" || $role == "director" ) { ?>
                            <!--for searches-->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Searches</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-search" aria-hidden="true"></i></div>
                                    <a href="<?= site_url() ?>search/" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                             <?php } ?>
                            <!-- ./col -->
                            <?php if ($role == "admin" || $role == "teacher" || $role == "director" ) { ?>
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>...</h3>

                                        <p>Teacher Syllabus</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <a href="<?= site_url() ?>teacher/get_all_classes/" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <?php if( $role == 'teacher'){ echo '</div><div class="row"><div class="col-lg-1 col-xs-4"></div>'; }?>
                            <!-- clo examination -->
                             <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>...</h3>
                                        <p>Examination</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <a href="<?= site_url() ?>Examination" class="small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <?php if( $role == 'teacher'){ echo '</div>'; }?>
                            <!-- end exam-->
                        <?php } ?>
                        <!--for searches-->
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
 
</section>
</div>
              

