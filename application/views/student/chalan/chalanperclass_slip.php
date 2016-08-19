<style>
    @media all {
        .page-break	{ display: none; }
    }

    @media print {
        .page-break	{ display: block; page-break-before: always; }
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="row no-print">
            <br/>
            <div class="col-xs-10 col-xs-offset-1">
                <a class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
                <a href="<?php echo site_url() ?>student/levelclass/<?php echo $std_info[0][0]->co_id;  ?>"  class="btn btn-success pull-right"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    Back</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php
        $sno = 1;
        foreach($std_info as $row){
        ?>        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>
                Fee Information        <span><?php
                    $randomString= date("d").date("m").date("Y");
                    echo  $randomString = $randomString.'-'.$sno;

                    ?></span>
            </h3>
        </section>

        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Note:</h4>
                This page has been enhanced for printing.Press Ctrl+P.
                <!--<pre>
                                <?php /* print_r($arr); */?>
                                <?php /* print_r($std_info); */?>
                                --><?php /* print_r($class_info); */?>
            </div>
        </div>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-sm-12 col-xs-12">

                    <img src="<?php echo site_url() ?>public/img/logo.jpg" class="img-responsive" style="height:100px;margin-bottom:-40px;  "/>
                    <h2 class="page-header text-center">
                        Seeds School of Excellence
                        <small class="pull-right" style="margin-right:20px; ">Date&nbsp;:&nbsp;<?php echo date("d-M-Y"); ?></small>
                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>Seeds School of Excellence</strong><br>
                        University Town Peshawar,<br>
                        KPK,Pakistan<br>
                        Phone:091-5845678<br>
                        Email: info@seedsschool.com
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>
                            <?php echo $row[0]->student_name; ?>
                        </strong><br>
                        Address: <?php echo $row[0]->student_address; ?><br>
                        Phone: <?php echo  $row[0]->student_contact; ?><br>
                        Email: <?php echo $row[0]->student_email; ?>
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Fee Slip #<?php
                        echo  $randomString;

                        ?></b><br>
                    <br>
                    <b>Fee Month&nbsp;: &nbsp;<?=$row[0]->std_month  ?></b><br>
                    <b>Payment Due:</b> <?=$row[0]->std_remain.".Rs"  ?> <br>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Level</th>
                            <th>Class</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><?=$row[0]->co_name;?></td>
                            <td><?=$row[0]->su_name;?></td>
                            <td><?=$row[0]->std_reason  ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">

                </div><!-- /.col -->
                <div class="col-xs-6">
                    <p class="lead">Amount Detail</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total Balance:</th>
                                <td><?=$row[0]->std_remain  ?></td>
                            </tr>
                            <tr>
                                <th>Last Paid</th>
                                <td><?=$row[0]->std_paid ?></td>
                            </tr>
                            <tr>
                                <th>Remain</th>
                                <td><?=$row[0]->std_remain  ?></td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- this row will not appear when printing -->
        </section><!-- /.content -->
            <div class="page-break"></div>
        <?php $sno++; } ?>
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
</body>