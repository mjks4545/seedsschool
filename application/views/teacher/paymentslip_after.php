<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h3>
                <span><?php
                    $length = 10;
                    $characters = '0123456789';
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, strlen($characters) - 1)];
                    }
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
                    <img src="<?php echo site_url() ?>public/img/logo.jpg" class="img-responsive" style="height:50px;margin-bottom:-40px;  "/>
                    <h6 style="font-size: 18px" class="page-header text-center">
                        &nbsp;&nbsp;Seeds School of Excellence in Education and Developmental Studies
                        <small class="pull-right" style="margin-right:20px; ">Date&nbsp;:&nbsp;<?php echo date("d-M-Y"); ?></small>
                    </h6>
                    <h2 class="page-header text-center">
                        <!-- <small class="pull-left" style="margin-right:20px; ">Teacher Name : <?= $result[0]['teacher_name']; ?></small> -->
                        Teacher Name : <?= $result[0]['name']; ?>
                        <!-- <small class="pull-right" style="margin-right:20px; ">Invoice&nbsp;:&nbsp;<?=$randomString;?></small> -->
                    </h2>
                    <div class="row invoice-info">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Student Name</th>
                                            <th>Level Name</th>
                                            <th>Subject Name</th>
                                            <th>Amount Paid</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            $total_remaning = 0; 
                                            foreach( $result as $teacher_payment ) {

                                        ?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $teacher_payment['student_name']?></td>
                                            <td><?= $teacher_payment['co_name']?></td>
                                            <td><?= $teacher_payment['su_name']?></td>
                                            <?php 
                                            $per = '0.' . $teacher_payment['comission'];
                                            $teacher_share = $teacher_payment['std_paid'] * $per; ?>
                                            <td><?= $teacher_share;$total_remaning += $teacher_share; ?></td>
                                        </tr>
                                        <?php 
                                                $i++;
                                            } 
                                        ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <!-- <div style="margin-left:12px;">
                                Recieved with thanks from:&nbsp;<strong>
                                    <?php echo $std_info[0]->student_name; ?>
                                </strong><br />
                                for month<strong>
                                   &nbsp;&nbsp;<?php $month = $arr['std_month'];
                                $month_p = date('F',strtotime("01-".$month."-2001"));
                                    $year = $arr['std_year'];
                                    echo $month_p;?>&nbsp;<?php echo $year; 
                                    ?>
                                </strong><br />
                                on account of



                            </div> -->

                             <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-6">
                                </div><!-- /.col -->
                                <div class="col-xs-6">
                                    <p class="lead">Amount Total</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%;">Paid:</th>
                                                <td><?=$total_remaning?></td>
                                            </tr>
                                            <!-- <tr>
                                                <th>Total Paid:</th>
                                                <td><?=$total_paid?></td>
                                            </tr> -->
                                        </table>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->


                        </div>
                    </div>    
                </div>
            </div>    


            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
