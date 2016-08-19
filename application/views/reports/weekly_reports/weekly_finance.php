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
            <small><a href="<?= site_url()?>reports/">Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>reports/weeklyreports">Weekly Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Profit loss Weekly Record
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Weekly Profit Details</h3>
                        <a href="<?= site_url() ?>reports/weeklyreports" class="pull-right"> Back</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Paid Amount</th>
                                <th>Date</th>
                                <th>Reason</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) {
                                $total_month = 0;
                                ?>

                            <?php } else {
                                $sno=1;
                                $total_month = 0;
                                foreach($result as $row){?>
                                    <tr>
                                        <td><?php echo $sno?></td>
                                        <td><?php echo $row['std_paid']?></td>
                                        <td><?php echo $row['std_date']?></td>
                                        <td><?php echo $row['std_reason']?></td>
                                        
                                    </tr>
                                    <?php $sno++; $total_month=($total_month+$row['std_paid']); } }?>
                            
             <?php if ($other_std_result == 0) { ?>

                                        <?php } else {
                                            $sno=1;
                                            foreach($other_std_result as $row){?>
                                                <tr>
                                                    <td><?php echo $sno?></td>
                                                    <td><?php echo $row['paid_amt']?></td>
                                                    <td><?php echo $row['otherpay_created_date']?></td>
                                                    <td><?php echo $row['amt_reason']?></td>
                                                    
                                                </tr>
                                                <?php $sno++; $total_month = ($total_month+$row['paid_amt']);} }?>

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



                        <!-- Right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Weekly Loss Details</h3>
                        <a href="<?= site_url() ?>reports/weeklyreports" class="pull-right"> Back</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Paid Amount</th>
                                <th>Date</th>
                                <th>Reason</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($other_expense_result == 0) {
                                $total_month = 0;
                                ?>

                            <?php } else {
                                $sno=1;
                                $total_month = 0;
                                foreach($other_expense_result as $row){?>
                                    <tr>
                                        <td><?php echo $sno?></td>
                                        <td><?php echo $row['expense_paid_amount']?></td>
                                        <td><?php echo $row['expense_created_date']?></td>
                                        <td><?php echo $row['expense_reason']?></td>
                                        
                                    </tr>
                                    <?php $sno++; $total_month=($total_month+$row['expense_paid_amount']); } }?>
                            
             <?php if ($other_std_result == 0) { ?>

                                        <?php } else {
                                            $sno=1;
                                            foreach($other_std_result as $row){?>
                                                <tr>
                                                    <td><?php echo $sno?></td>
                                                    <td><?php echo $row['paid_amt']?></td>
                                                    <td><?php echo $row['otherpay_created_date']?></td>
                                                    <td><?php echo $row['amt_reason']?></td>
                                                    
                                                </tr>
                                                <?php $sno++; $total_month = ($total_month+$row['paid_amt']);} }?>

             <?php if ($other_staff_expense_result == 0) { ?>
                                        <?php } else {
                                            $sno=1;
                                            foreach($other_staff_expense_result as $row){?>
                                                <tr>
                                                    <td><?php echo $sno?></td>
                                                    <td><?php echo $row['paid_salary']?></td>
                                                    <td><?php echo $row['created_date']?></td>
                                                    <td><?php echo $row['name']?></td>
                                                    
                                                </tr>
                                                <?php $sno++; $total_month = ($total_month+$row['paid_salary']);} }?>
            
            
            <?php if ($weekly_teacher_expense_reports == 0) { ?>

                                        <?php } else {
                                            $sno=1;
                                            foreach($weekly_teacher_expense_reports as $row){?>
                                                <tr>
                                                    <td><?php echo $sno?></td>
                                                    <td><?php echo $row['paid_salary']?></td>
                                                    <td><?php echo $row['created_date']?></td>
                                                    <td><?php echo $row['amount_reason']?></td>
                                                    
                                                </tr>
                                                <?php $sno++; $total_month = ($total_month+$row['paid_salary']);} }?>
                       
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
        </div>

    </section>
</div>

