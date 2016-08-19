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
                <a href="<?= site_url() ?>reports/monthlyreports">Monthly Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Profit loss Monthly Record
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
                        <h3 class="box-title">Monthly Profit of <?= date("Y"); ?></h3>
                        <a href="<?= site_url() ?>reports/monthlyreports" class="pull-right"> Back</a>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">


                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <tr style="background:#888888; color:#FFF;">
                                    <th>S.No</th>
                                    <th>Reason</th>
                                    <?php
                                    $sno = 1;
                                    $y = date("Y");
                                    for ($i = 1; $i <= 12; $i++) {
                                        ?>
                                        <th>
                                            <?php
                                            $month = date('M', strtotime("01-" . $i . "-2010"));
                                            echo $month . "-" . $y;
                                            ?>
                                        </th>
                                    <?php } ?>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($income == 0) {
                                    $total_month = 0;
                                    ?>

                                <?php } else {
                                    foreach ($income as $inc) {

                                        if (isset($inc->p_id)) {
                                            if ($inc->std_paid!= 0) {
                                                echo "<tr>";
                                                echo "<td>" .$sno. "</td>";
                                                echo "<td>" . $inc->std_reason . "</td>";
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $month = date('M', strtotime("01-" . $i . "-2010"));
                                                    echo "<td>";
                                                    if ($inc->std_month == $month) {

                                                        echo $inc->std_paid;

                                                    }
                                                    echo "</td>";

                                                }
                                                echo "</tr>";
                                                $sno++; }
                                        }
                                        // for other  stdent payment
                                        if (isset($inc->otherpay_id)) {
                                            if ($inc->paid_amt!= 0) {
                                                echo "<tr>";
                                                echo "<td>" . $sno. "</td>";
                                                echo "<td>" . $inc->amt_reason . "</td>";
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $month = date('M', strtotime("01-" . $i . "-2010"));
                                                    echo "<td>";
                                                    if ($inc->other_month == $month) {

                                                        echo $inc->paid_amt;

                                                    }
                                                    echo "</td>";

                                                }
                                                echo "</tr>";
                                                $sno++;  }
                                        }
                                    }// end of foreach

                                } ?>
                                </tbody>
                                <tr style="background:#888888; color:#FFF;">
                                    <td></td>
                                    <td>Total:</td>
                                    <?php
                                    $y = date("Y");
                                    for ($i = 1; $i <= 12; $i++) {
                                        ?>
                                        <td>
                                            <?php
                                            $month = date('M', strtotime("01-" . $i . "-2010"));
                                            $total = 0;
                                           foreach ($income as $inc) {
                                                 if (isset($inc->p_id)) {
                                                   if ($inc->std_month == $month) {
                                                         $total = $total+$inc->std_paid;
                                                 }
                                                }
                                            if (isset($inc->otherpay_id)) {
                                                if ($inc->other_month == $month) {
                                                    $total = $total+$inc->paid_amt;

                                                    }
                                                }
                                              }
                                            echo $total;
                                            ?>
                                        </td>
                                    <?php } ?>

                                </tr>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
<!///////////////////////// for monthly Lost//////////////////////////////////-->

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Expenses of <?= date("Y"); ?></h3>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered">
                                <thead>
                                <tr style="background:#888888; color:#FFF;">
                                    <th>S.No</th>
                                    <th>Reason</th>
                                    <?php
                                    $sno = 1;
                                    $y = date("Y");
                                    for ($i = 1; $i <= 12; $i++) {
                                        ?>
                                        <th>
                                            <?php
                                            $month = date('M', strtotime("01-" . $i . "-2010"));
                                            echo $month . "-" . $y;
                                            ?>
                                        </th>
                                    <?php } ?>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($expense == 0) {
                                    $total_month = 0;
                                    ?>

                                <?php } else {
                                    foreach ($expense as $ex) {

                                        if (isset($ex->expense_id)) {
                                            if ($ex->expense_paid_amount!= 0) {
                                                echo "<tr>";
                                                echo "<td>" .$sno. "</td>";
                                                echo "<td>" . $ex->expense_reason . "</td>";
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $month = date('M', strtotime("01-" . $i . "-2010"));
                                                    echo "<td>";
                                                    if ($ex->expense_month == $month) {

                                                        echo $ex->expense_paid_amount;

                                                    }
                                                    echo "</td>";

                                                }
                                                echo "</tr>";
                                                $sno++; }
                                        }
                                        // for other  other staff expense
                                        if (isset($ex->id)) {
                                            if ($ex->paid_salary!= 0) {
                                                echo "<tr>";
                                                echo "<td>" . $sno. "</td>";
                                                echo "<td>" . $ex->amount_reason . "</td>";
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $month = date('M', strtotime("01-" . $i . "-2010"));
                                                    $staff_m = date('M', strtotime("01-" . $ex->paid_month . "-2010"));
                                                    echo "<td>";
                                                    if ($staff_m == $month) {

                                                        echo $ex->paid_salary;

                                                    }
                                                    echo "</td>";

                                                }
                                                echo "</tr>";
                                                $sno++;  }
                                        }
                                     // for teacher sallary//////////////////////////////////////////
                                        if (isset($ex->sa_id)) {
                                            if ($ex->paid_salary!= 0) {
                                                echo "<tr>";
                                                echo "<td>" . $sno. "</td>";
                                                echo "<td>" . $ex->amount_reason . "</td>";
                                                for ($i = 1; $i <= 12; $i++) {
                                                    $month = date('M', strtotime("01-" . $i . "-2010"));
                                                    $teacher_m = date('M', strtotime("01-" . $ex->paid_month . "-2010"));
                                                    echo "<td>";
                                                    if ($teacher_m == $month) {

                                                        echo $ex->paid_salary;

                                                    }
                                                    echo "</td>";

                                                }
                                                echo "</tr>";
                                                $sno++;  }
                                        }
                                    }// end of foreach

                                } ?>
                                </tbody>
                                <tr style="background:#888888; color:#FFF;">
                                    <td></td>
                                    <td>Total:</td>
                                    <?php
                                    $y = date("Y");
                                    for ($i = 1; $i <= 12; $i++) {
                                        ?>
                                        <td>
                                            <?php
                                            $month = date('M', strtotime("01-" . $i . "-2010"));
                                            $total_e = 0;
                                            foreach ($expense as $ex) {
                                                if (isset($ex->expense_id)) {
                                                    if ($ex->expense_month == $month) {
                                                        $total_e = $total_e+$ex->expense_paid_amount;
                                                    }
                                                }
                                                if (isset($ex->id)) {
                                                    $staff_m = date('M', strtotime("01-" . $ex->paid_month . "-2010"));
                                                    if ($staff_m == $month) {
                                                        $total_e = $total_e+$ex->paid_salary;

                                                    }
                                                }
                                                if (isset($ex->sa_id)) {
                                                    $teacher_m = date('M', strtotime("01-" . $ex->paid_month . "-2010"));
                                                    if ($teacher_m == $month) {
                                                        $total_e = $total_e+$ex->paid_salary;

                                                    }
                                                }
                                            }
                                            echo $total_e;
                                            ?>
                                        </td>
                                    <?php } ?>

                                </tr>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

<!///////////////////////// end monthly Lost//////////////////////////////////-->

    </section>
</div>

