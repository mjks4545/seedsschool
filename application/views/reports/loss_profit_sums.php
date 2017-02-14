<style type="text/css">
    @media print{
        .print-class{
            display: none;
        }
    }
</style>
<?php
$session = $this->session->userdata('session_data');
$id = $session['id'];
$role = $session['role']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <span class="text-capitalize">Loss And</span>
            Profit Reports
            <small>Home</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elementss -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profit and Loss Reports</h3>
                    </div>
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3><?= $montlyfee + $trf; ?> /- PKR</h3>
                                        <p>Total Fee Received</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?= site_url() ?>visitor/index" class="print-class small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3><?= $expense ?> /- PKR</h3>
                                        <p>Expenses</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-male" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?= site_url() ?>teacher/viewteacher" class="small-box-footer print-class">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3><?= $teacher_salaries ?> /- PKR</h3>
                                        <p>Paid To Teachers </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    </div>
                                    <a href="<?= site_url() ?>academic/index" class="print-class small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3><?= (($montlyfee + $trf) - $teacher_salaries) - $expense;?> /- PKR</h3>
                                        <p>Profit</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-street-view" aria-hidden="true"></i></div>
                                    <a href="<?= site_url() ?>otherstaff/index" class="print-class small-box-footer">
                                        Click here <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.box -->
        </div>
 
</section>
</div>
              

