<style>
    td, th {
        text-align: center;
    }

    .name {
        margin-top: 60px;
    }
</style>

<?php $session = $this->session->userdata('session_data');
$role = $session['role']; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if ($role == "admin") { ?>
                Admin Dashboard
            <?php } elseif ($role == "receptionist") { ?>
                Receptionist Dashboard
            <?php } ?>
            <small><a href="<?= site_url() ?>visitor/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>visitor/viewvisitors">
                    View Visitor
                </a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Visitor History
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
                        <h3 class="box-title">Visitor History</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <b style="font-size:15px; ">Name:</b>

                                    <?= $v_history[0]->name ?>
                                    <br/>
                                    <label class="">
                                        <b style="font-size:15px; ">Conatc Number:</b>
                                    </label>
                                    <?= $v_history[0]->contact ?><br/>
                                    <label class="">
                                        <b style="font-size:15px; ">CNIC:</b>
                                    </label>
                                    <?= $v_history[0]->v_cnic ?>
                                </div>
                                <div class="col-sm-4">
                                    <label class="">
                                        <b style="font-size:15px; ">RelationShip:</b>
                                    </label>
                                    <?= $v_history[0]->relationship ?>
                                    <br/>
                                    <label class="">
                                        <b style="font-size:15px; ">Address:</b>
                                    </label>
                                    <?= $v_history[0]->address ?>
                                    <br/>
                                    <b style="font-size:15px; ">Gender:</b>
                                    <?= $v_history[0]->v_gender ?>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-xs-offset-1">
                                    <hr/>
                                    <div class="col-sm-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                Reason of Visit
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                $sno = 1;
                                                foreach ($v_history as $hist) {
                                                    echo "<i class='glyphicon glyphicon-hand-right'></i>".' &nbsp;' . $hist->reason . "<br/>";
                                                    $sno++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                Note
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                $sno = 1;
                                                foreach ($v_history as $hist) {
                                                    echo "<i class='glyphicon glyphicon-hand-right'></i>".' &nbsp;' . $hist->note . "<br/>";
                                                    $sno++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- for coments-->
                                    <div class="col-sm-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                               <i class="glyphicon glyphicon-comment"></i>&nbsp;Comments
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                $sno = 1;
                                                foreach ($v_history as $hist) {
                                                    if(!empty($hist->comments)){
                                                        echo "<i class='glyphicon glyphicon-triangle-right'></i>". '&nbsp;' . $hist->comments . "<br/>";
                                                    }
                                                    else{
                                                        echo "<i class='glyphicon glyphicon-triangle-right'></i>".'&nbsp;' ."No Comments" . "<br/>";
                                                    }
                                                    $sno++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

