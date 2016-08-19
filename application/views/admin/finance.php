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
            <small>Finance</small>
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
                    </div>
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>...</h3>

                                    <p>Reports</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-flag" aria-hidden="true"></i></div>
                                <a href="<?= site_url() ?>reports/index" class="small-box-footer">
                                    Click here <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>...</h3>

                                    <p>Expenses</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money" aria-hidden="true"></i></div>
                                <a href="<?= site_url() ?>expenses/index" class="small-box-footer">
                                    Click here <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>...</h3>

                                    <p>Bank</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money" aria-hidden="true"></i></div>
                                <a href="<?= site_url() ?>bank/index" class="small-box-footer">
                                    Click here <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


