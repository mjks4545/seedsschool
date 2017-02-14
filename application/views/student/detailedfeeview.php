<style>
    td, th {
        text-align: center;
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
<!--            <small><a href="<?= site_url() ?>visitor/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View visitor
            </small>-->
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
                        <h3 class="box-title">Fee To be Paid by Student</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Level</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Amount</th>
                                <th>Date From</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $i = 1;
                                    $payment_array = [];
                                    $paid_array    = [];
                                    $total         = 0;
                                    foreach ($data as $value) {
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $value->co_name; ?></td>
                                        <td><?= $value->su_name; ?></td>
                                        <td><?= $value->name; ?></td>
                                        <td><?= $value->to_be_pay;$total += $value->to_be_pay; ?></td>
                                        <td><?= $value->starting_date;?></td>
                                    </tr>
                                <?php
                                    foreach ($value->paid as $payment) {
                                        
                                        if( $payment->std_paid == 0 ){
                                            $payment_array[$payment->p_id]['amount'] = $payment->std_remain;
                                            $payment_array[$payment->p_id]['starting'] = $payment->f_starting_date;
                                            $payment_array[$payment->p_id]['course_name'] = $value->co_name;
                                            $payment_array[$payment->p_id]['teacher_name'] = $value->name;
                                            $payment_array[$payment->p_id]['subject_name'] = $value->su_name;
                                        }else{
                                            $paid_array[$payment->p_id]['amount'] = $payment->std_paid;
                                            $paid_array[$payment->p_id]['discount'] = $payment->std_discount;
                                            $paid_array[$payment->p_id]['remaning'] = $payment->std_remain;
                                            $paid_array[$payment->p_id]['course_name'] = $value->co_name;
                                            $paid_array[$payment->p_id]['teacher_name'] = $value->name;
                                            $paid_array[$payment->p_id]['subject_name'] = $value->su_name;
                                            $paid_array[$payment->p_id]['starting'] = $payment->std_date;
                                        }
                                    }
                                    $i++;
                                    }
                                    foreach($payment_array as $array){
                                         ?>
                                         <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $array['course_name']; ?></td>
                                            <td><?= $array['subject_name']; ?></td>
                                            <td><?= $array['teacher_name']; ?></td>
                                            <td><?= $array['amount'];$total += $array['amount'] ?></td>
                                            <td><?= $array['starting'];?></td>
                                        </tr>
                                         <?php
                                         $i++;    
                                    } 
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th><?= $total; ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Paid Fee Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Level</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Paid</th>
                                <th>Discount</th>
                                <th>Remaning</th>
                                <th>Date Paid</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $total = 0;
                                    $d_total = 0;
                                    $r_total = 0;
                                    foreach($paid_array as $array){
                                ?>
                                         <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $array['course_name']; ?></td>
                                            <td><?= $array['subject_name']; ?></td>
                                            <td><?= $array['teacher_name']; ?></td>
                                            <td><?= $array['amount'];$total += $array['amount']; ?></td>
                                            <td><?= $array['discount'];$d_total += $array['discount'] ?></td>
                                            <td><?= $array['remaning'];$r_total +=$array['remaning'] ?></td>
                                            <td><?= $array['starting'];?></td>
                                        </tr>
                                     <?php
                                         $i++;    
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th><?= $total?></th>
                                    <th><?= $d_total?></th>
                                    <th><?= $r_total?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">TRF Details Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Remaning</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $total   = 0;
                                    $p_total = 0;
                                    $r_total = 0;
                                    foreach($trf as $array){
                                ?>
                                         <tr>
                                            <td><?= $i; ?></td>
                                            <td>
                                                <?php 
                                                    if( $array->paid_amt > 0 ){
                                                        echo 0;
                                                        $total += 0; 
                                                    }else{
                                                        echo $array->total_amt;
                                                        $total += $array->total_amt;
                                                    }

                                                ?>
                                                    
                                            </td>
                                            <td><?= $array->paid_amt;$p_total += $array->paid_amt ?></td>
                                            <td><?= $array->otherfee_remain;$r_total += $array->otherfee_remain ?></td>
                                            <td><?= $array->otherpay_created_date; ?></td>
                                        </tr>
                                     <?php
                                         $i++;    
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th><?= $total?></th>
                                    <th><?= $p_total?></th>
                                    <th><?= $r_total?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>