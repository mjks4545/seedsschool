<body class="hold-transition skin-blue sidebar-mini">
    <style>
/*@page { size: auto;  margin: 4mm 4mm; }*/
@media print {
  @page { margin: 0; }
  body { margin: 1cm; }
}
</style>
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
                    </h6>
                    <h2 class="page-header text-center">
                        <small class="pull-left" style="margin-right:20px; ">Father Name : <?= $student->std_father_name; ?></small>
                        <span style="font-size: 65%;">&nbsp;&nbsp;Student Name : <?= $student->student_name; ?></span>
                        <small class="pull-right" style="margin-right:20px; ">Date&nbsp;:&nbsp;<?php echo date("d-M-Y"); ?></small>
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
                                            <th>Subject</th>
                                            <th>Amount Due</th>
                                            <th>Amount Paid</th>
                                            <th>Discount</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        $total_paid     = 0;
                                        $total_remaning = 0;
                                        $i = 1;
                                        if(isset( $otherpayments )){
                                            if( $otherpayments['paid_amt'] == 0 && $otherpayments['otherfee_remain'] == 0 ){

                                            }else{
                                                ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td>Admission Fee</td>
                                                    <td><?= $otherpayments['total_amt']?></td>
                                                    <td><?= $otherpayments['paid_amt']?></td>
                                                    <td><?= $otherpayments['other_discount']?></td>
                                                    <td><?= $otherpayments['otherfee_remain']?></td>
                                                </tr>
                                                <?php
                                                $i++;
                                                $total_paid        += $otherpayments['paid_amt'];
                                                $total_remaning    += $otherpayments['otherfee_remain'];
                                            } 
                                        }
                                       foreach( $paymentdetail as $payment ){
                                       if( $payment['std_paid'] == 0 && $payment['std_remain'] == 0){
                                            continue;
                                       } 
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $payment['subject_name']?></td>
                                            <td><?= $payment['std_payment']?></td>
                                            <td><?= $payment['std_paid']?></td>
                                            <td><?= $payment['std_discount']?></td>
                                            <td><?= $payment['std_remain']?></td>
                                        </tr>
                                    <?php
                                            $i++;
                                            $total_paid      += $payment['std_paid'];
                                            $total_remaning  += $payment['std_remain'];
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
                                <h4 style="margin-top: 52px;margin-left: 100px;">Student Copy</h4>
                                </div><!-- /.col -->
                                <div class="col-xs-6">
                                    <p class="lead">Amount Detail</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%;">Total Balance:</th>
                                                <td><?=$total_remaning?></td>
                                            </tr>
                                            <tr>
                                                <th>Total Paid:</th>
                                                <td><?=$total_paid?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <h2 class="page-header text-center">
                                <small class="pull-left" style="margin-right:20px; "><b>Website : </b>www.seedsschoolofexcellence.com</small>
                                <span style="font-size: 65%;"><b>Email : </b>seedsschoolofexcellence@gmail.com</span>
                                <small class="pull-right" style="margin-right:20px; "><b>Phone : </b>091-5845678</small>
                                <!-- <small class="pull-right" style="margin-right:20px; ">Invoice&nbsp;:&nbsp;<?=$randomString;?></small> -->
                            </h2>

                        </div>
                    </div>    
                </div>
                <hr style="border: 1px solid;">
                <div class="col-sm-12 col-xs-12">
                    <img src="<?php echo site_url() ?>public/img/logo.jpg" class="img-responsive" style="height:50px;margin-bottom:-40px;  "/>
                    <h6 style="font-size: 18px" class="page-header text-center">
                        &nbsp;&nbsp;Seeds School of Excellence in Education and Developmental Studies
                    </h6>
                    <h2 class="page-header text-center">
                        <small class="pull-left" style="margin-right:20px; ">Father Name : <?= $student->std_father_name; ?></small>
                        <span style="font-size: 65%;">&nbsp;&nbsp;Student Name : <?= $student->student_name; ?></span>
                        <small class="pull-right" style="margin-right:20px; ">Date&nbsp;:&nbsp;<?php echo date("d-M-Y"); ?></small>
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
                                            <th>Subject</th>
                                            <th>Amount Due</th>
                                            <th>Amount Paid</th>
                                            <th>Discount</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                        $i = 1;
                                        if(isset( $otherpayments )){
                                            if( $otherpayments['paid_amt'] == 0 && $otherpayments['otherfee_remain'] == 0 ){

                                            }else{
                                                ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td>Admission Fee</td>
                                                    <td><?= $otherpayments['total_amt']?></td>
                                                    <td><?= $otherpayments['paid_amt']?></td>
                                                    <td><?= $otherpayments['other_discount']?></td>
                                                    <td><?= $otherpayments['otherfee_remain']?></td>
                                                </tr>
                                                <?php
                                                $i++;
                                            }
                                        }
                                       foreach( $paymentdetail as $payment ){
                                        if( $payment['std_paid'] == 0 && $payment['std_remain'] == 0){
                                            continue;
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $payment['subject_name']?></td>
                                            <td><?= $payment['std_payment']?></td>
                                            <td><?= $payment['std_paid']?></td>
                                            <td><?= $payment['std_discount']?></td>
                                            <td><?= $payment['std_remain']?></td>
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
                                    <h4 style="margin-top: 52px;margin-left: 100px;">Office Copy</h4>
                                </div><!-- /.col -->
                                <div class="col-xs-6">
                                    <p class="lead">Amount Detail</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%;">Total Balance:</th>
                                                <td><?=$total_remaning?></td>
                                            </tr>
                                            <tr>
                                                <th>Total Paid:</th>
                                                <td><?=$total_paid?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <h2 class="page-header text-center">
                                <small class="pull-left" style="margin-right:20px; "><b>Website : </b>www.seedsschoolofexcellence.com</small>
                                <span style="font-size: 65%;"><b>Email : </b>seedsschoolofexcellence@gmail.com</span>
                                <small class="pull-right" style="margin-right:20px; "><b>Phone : </b>091-5845678</small>
                                <!-- <small class="pull-right" style="margin-right:20px; ">Invoice&nbsp;:&nbsp;<?=$randomString;?></small> -->
                            </h2>

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
