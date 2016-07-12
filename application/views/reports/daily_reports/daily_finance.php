<style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small><a href="<?= site_url()?>reports/">Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>reports/dailyreports">Daily Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Profit Daily Record
            </small>
        </h1>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Daily Profit Details</h3>
                        
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Paid amount</th>
                                <th>Date</th>
                                <th>Reason</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>
                            <?php } else {
                            $sno = 1;
                            $total_month = 0;
                             foreach ($result as $key) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $key->std_paid?></td>
                                        <td><?= $key->std_date?></td>
                                        <td><?= $key->std_reason?></td>
                                    </tr>
                                   <?php $sno++; $total_month=($total_month+$key->std_paid);    } } ?>
<!--- ////////////// SECOND TABLE DATA///////////-->

                           <?php if ($other_result == 0) { ?>
                            <?php } else {
                            $sno = $sno;
                             foreach ($other_result as $key) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $key->paid_amt?></td>
                                        <td><?= $key->otherpay_created_date?></td>
                                        <td><?= $key->amt_reason?></td>
                                    </tr>
                                   <?php $sno++;  $total_month = ($total_month+$key->paid_amt);  }  } ?>        



                                    <tr style="background:#ccc">
                                        <td>Total</td>
                                        <td><?php echo $total_month;?></td>
                                        <td> </td>
                                        <td></td>
                                    </tr>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        
<!--    //////////////////////////    LOSS   //////////////////////-->

            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Daily Loss Details</h3>
                        
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Paid amount</th>
                                <th>Date</th>
                                <th>Paid to</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($expense_result == 0) { ?>
                            <?php } else {
                            $sno = 1;
                            $total_month = 0;
                             foreach ($expense_result as $key) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $key->expense_paid_amount?></td>
                                        <td><?= $key->expense_created_date?></td>
                                        <td><?= $key->expense_reason?></td>
                                    </tr>
                                   <?php $sno++; $total_month=($total_month+$key->expense_paid_amount);    } } ?>

                           <?php if ($staff_result == 0) { ?>
                            <?php } else {
                            $sno = $sno;
                             foreach ($staff_result as $key) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $key->paid_salary?></td>
                                        <td><?= $key->created_date?></td>
                                        <td><?= $key->amount_reason?></td>
                                    </tr>
                                   <?php $sno++;  $total_month = ($total_month+$key->paid_salary);  }  } ?>        

<!--////////////// Other table///////-->

  <?php if ($daily_teacher_staff_loss == 0) { ?>
                                        <?php } else {
                                        $sno = $sno;
                             foreach ($daily_teacher_staff_loss as $key) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $key->paid_salary?></td>
                                        <td><?= $key->created_date?></td>
                                        <td><?= $key->amount_reason?></td>
                                    </tr>
                                   <?php $sno++;  $total_month = ($total_month+$key->paid_salary);
                                     }  } ?>      

                                    <tr style="background:#ccc">
                                        <td>Total</td>
                                        <td><?php echo $total_month;?></td>
                                        <td> </td>
                                        <td></td>
                                    </tr>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->

  <!--///////////////////  END OF LOSS/////////////////-->          


        </div>

    </section>
</div>

