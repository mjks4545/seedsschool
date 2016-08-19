
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         <?php $session = $this->session->userdata('session_data');
          $role = $session['role'];  ?>

          <?php if($role=="admin"){?>
                Admin Dashboard
          <?php }?>

        <?php if($role=="receptionist"){?>
                Receptionist Dashboard
          <?php }?>
            <small>Reception</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
         <div class="box-header with-border">
            </div><!-- /.box-header -->
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
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Add Visitor</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-plus" aria-hidden="true"></i></div>
                                <a href="<?= site_url()?>visitor/addvisitor" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Teacher Detail</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="<?= site_url()?>teacher/index" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Student Detail</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="<?= site_url()?>student/index" class="small-box-footer">
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


