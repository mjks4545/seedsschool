<style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?= site_url() ?>reports/">Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>reports/dailyreports">Daily Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Profit Daily Record
            </small>
        </h1>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- ////////////////////////// for income -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Daily Profit Details of <?= date("M-Y"); ?></h3>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <?php if ($income == 0) { ?>
                                <?php } else { ?>
                                    <thead>
                                    <tr style="background:#888888; color:#FFF;">
                                        <th>S.No</th>
                                        <th>Reason</th>
                                        <?php // start date of the month
                                        $start_date = date("d-M-Y", strtotime(date('01-' . ('M') . date('Y'))));
                                        //  end date of the month
                                        $end_date = date("d-M-Y", strtotime('-1 second', strtotime('+1 month', strtotime(date('01-' . ('M') . date('Y'))))));
                                        //  number of days between tow days
                                        $datediff = $end_date - $start_date;


                                        $interval = $start_date; //date('d-M-Y', strtotime('-8 days'));
                                        $current_date = date("d-M-Y");
                                        for ($i = 1; $i <= $datediff + 1; $i++) {
                                            ?>
                                            <th>
                                                <?php echo date("d", strtotime($interval)); ?>
                                            </th>
                                            <?php $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
                                        } ?>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sno=1;
                                    foreach ($income as $inc) {

                                        if (isset($inc->p_id)) {
                                            if ($inc->std_paid != 0) {
                                                echo "<tr>";
                                                echo "<td>" . $sno . "</td>";
                                                echo "<td>" . $inc->std_reason . "</td>";
                                                $start_date = date("d-M-Y", strtotime(date('01-' . ('M') . date('Y'))));
                                                //  end date of the month
                                                $end_date = date("d-M-Y", strtotime('-1 second', strtotime('+1 month', strtotime(date('01-' . ('M') . date('Y'))))));
                                                //  number of days between tow days
                                                $datediff = $end_date - $start_date;


                                                $interval = $start_date; //date('d-M-Y', strtotime('-8 days'));
                                                $current_date = date("d-M-Y");
                                                for ($i = 1; $i <= $datediff + 1; $i++) {
                                                    echo "<td>";
                                                    if ($inc->std_date == $interval) {
                                                        echo $inc->std_paid;
                                                    }
                                                    echo "</td>";
                                                    $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
                                                }
                                                echo "</tr>";
                                                $sno++;
                                            }
                                        }
                                        // for other  stdent payment
                                        if (isset($inc->otherpay_id)) {
                                            if ($inc->paid_amt != 0) {
                                                echo "<tr>";
                                                echo "<td>" . $sno . "</td>";
                                                echo "<td>" . $inc->amt_reason . "</td>";
                                                $start_date = date("d-M-Y", strtotime(date('01-' . ('M') . date('Y'))));
                                                //  end date of the month
                                                $end_date = date("d-M-Y", strtotime('-1 second', strtotime('+1 month', strtotime(date('01-' . ('M') . date('Y'))))));
                                                //  number of days between tow days
                                                $datediff = $end_date - $start_date;


                                                $interval = $start_date; //date('d-M-Y', strtotime('-8 days'));
                                                $current_date = date("d-M-Y");
                                                for ($i = 1; $i <= $datediff + 1; $i++) {
                                                    echo "<td>";
                                                    if ($inc->otherpay_created_date == $interval) {
                                                        echo $inc->paid_amt;
                                                    }
                                                    echo "</td>";
                                                    $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
                                                }
                                                echo "</tr>";
                                                $sno++;
                                            }
                                        }
                                    }// end of foreach
                                    ?>


                                    </tbody>
                                    <tr style="background:#888888; color:#FFF;">
                                        <td></td>
                                        <td>Total:</td>
                                        <?php
                                        $start_date = date("d-M-Y", strtotime(date('01-' . ('M') . date('Y'))));
                                        //  end date of the month
                                        $end_date = date("d-M-Y", strtotime('-1 second', strtotime('+1 month', strtotime(date('01-' . ('M') . date('Y'))))));
                                        //  number of days between tow days
                                        $datediff = $end_date - $start_date;


                                        $interval = $start_date; //date('d-M-Y', strtotime('-8 days'));
                                        $current_date = date("d-M-Y");
                                        for ($i = 1; $i <= $datediff + 1; $i++) {    ?>
                                            <td>
                                                <?php
                                                $month = date('M', strtotime("01-" . $i . "-2010"));
                                                $total = 0;
                                                foreach ($income as $inc) {
                                                    if (isset($inc->p_id)) {
                                                        if ($inc->std_date == $interval) {
                                                            $total = $total+$inc->std_paid;
                                                        }
                                                    }
                                                    if (isset($inc->otherpay_id)) {
                                                        if ($inc->otherpay_created_date == $interval) {
                                                            $total = $total+$inc->paid_amt;

                                                        }
                                                    }
                                                }
                                                echo $total;
                                                ?>
                                            </td>
                                        <?php
                                            $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
                                             }
                                        ?>

                                    </tr>
                                <?php }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box -->
            </div>
<!--///////////////////////////// for daily expenses////////////////////////////-->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daily Expenses Details of <?= date("M-Y"); ?></h3>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <?php if ($expense == 0) { ?>
                                <?php } else { ?>
                                    <thead>
                                    <tr style="background:#888888; color:#FFF;">
                                        <th>S.No</th>
                                        <th>Reason</th>
                                        <?php // start date of the month
                                        $start_date = date("d-M-Y", strtotime(date('01-' . ('M') . date('Y'))));
                                        //  end date of the month
                                        $end_date = date("d-M-Y", strtotime('-1 second', strtotime('+1 month', strtotime(date('01-' . ('M') . date('Y'))))));
                                        //  number of days between tow days
                                        $datediff = $end_date - $start_date;


                                        $interval = $start_date; //date('d-M-Y', strtotime('-8 days'));
                                        $current_date = date("d-M-Y");
                                        for ($i = 1; $i <= $datediff + 1; $i++) {
                                            ?>
                                            <th>
                                                <?php echo date("d", strtotime($interval)); ?>
                                            </th>
                                            <?php $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
                                        } ?>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sno=1;
                                    foreach ($expense as $row => $values) {
                                       
                                        if ( !empty( $values ) ) {
                                            if ( !empty( $values ) ) {
                                                echo "<tr>";
                                                echo "<td>" . $sno . "</td>";
                                                echo "<td>" . $row . "</td>";
                                                $start_date = date("d-M-Y", strtotime(date('01-' . ('M') . date('Y'))));
                                                //  end date of the month
                                                $end_date = date("d-M-Y", strtotime('-1 second', strtotime('+1 month', strtotime(date('01-' . ('M') . date('Y'))))));
                                                //  number of days between tow days
                                                $datediff = $end_date - $start_date;


                                                $interval = $start_date; //date('d-M-Y', strtotime('-8 days'));
                                                $current_date = date("d-M-Y");
                                                for ($i = 1; $i <= $datediff + 1; $i++) {
                                                    echo "<td>";
                                                    foreach( $values as $value ){
                                                        if( $row != 'Paid To Teacher' && $row != 'Staff Salary' ){
                                                            if ($value->expense_created_date == $interval) {
                                                                echo $value->expense_paid_amount;
                                                            }
                                                        }else{
                                                            if ($value->created_date == $interval) {
                                                                echo $value->paid_salary;
                                                            }
                                                        }
                                                    }
                                                    echo "</td>";
                                                    $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
                                                }
                                                echo "</tr>";
                                                $sno++;
                                            }
                                        }
                                    }// end of foreach
                                    ?>


                                    </tbody>
                                    <tr style="background:#888888; color:#FFF;">
                                        <td></td>
                                        <td>Total:</td>
                                        <?php
                                        $start_date = date("d-M-Y", strtotime(date('01-' . ('M') . date('Y'))));
                                        //  end date of the month
                                        $end_date = date("d-M-Y", strtotime('-1 second', strtotime('+1 month', strtotime(date('01-' . ('M') . date('Y'))))));
                                        //  number of days between tow days
                                        $datediff = $end_date - $start_date;


                                        $interval = $start_date; //date('d-M-Y', strtotime('-8 days'));
                                        $current_date = date("d-M-Y");
                                        for ($i = 1; $i <= $datediff + 1; $i++) {    ?>
                                            <td>
                                                <?php
                                                $month = date('M', strtotime("01-" . $i . "-2010"));
                                                $total = 0;
                                                foreach ($expense as $row => $amount) {
                                                    foreach ($amount as $value) {
                                                        if( $row != 'Paid To Teacher' && $row != 'Staff Salary' ){
                                                            if ($value->expense_created_date == $interval) {
                                                                $total += $value->expense_paid_amount;
                                                            }
                                                        }else{
                                                            if ($value->created_date == $interval) {
                                                                $total += $value->paid_salary;
                                                            }
                                                        }
                                                    }
                                                }
                                                echo $total;
                                                ?>
                                            </td>
                                            <?php
                                            $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval)));
                                        }
                                        ?>

                                    </tr>
                                <?php }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box -->
            </div>
<!--///////////////////////////// end  daily expenses////////////////////////////-->
        </div>

    </section>
</div>

