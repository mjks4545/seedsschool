
          <?php $session = $this->session->userdata('session_data');
           $role = $session['role'];?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        
       <?php if($role=="admin"){?>
            Admin Dashboard
            <?php }elseif($role=="receptionist"){?>
            Receptionist Dashboard
            <?php }?>

            <small>
            <a href="<?= site_url() ?>visitor/">Visitor</a>
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            Total Visitor Record</small>
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
                            <div class="small-box bg-aqua" style="height:120px; ">
                                <div class="inner">
                                    <h4>Total Visitors</h4>
                                    <p class="badge"><?php echo $total_visitors; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green" style="height:120px;">
                                <div class="inner">
                                    <h4>Visitors To be view</h4>
                                    <p class="badge"><?php echo $unviewed_visitors; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>                                </div>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-primary" style="height:120px;">
                                <div class="inner">
                                    <h4>Viewed Visitors</h4>
                                    <p class="badge"><?php echo $viewed_visitors; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-eye" aria-hidden="true"></i>                                </div>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                </div>
            </div><!-- /.box -->
        </div>
</div>
</section>
</div>


