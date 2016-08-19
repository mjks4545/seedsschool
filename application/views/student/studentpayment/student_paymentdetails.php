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
            <small><a href="<?= site_url()?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>studentpayment/viewstd">All Students</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Student Payment Details
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
                        <h3 class="box-title">Payment Details</h3>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Amount Reason</th>
                                <th>Amount Month</th>

                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Remain Amount</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>

                            <?php } else {
                                $total_paid = 0;
                                $total_remain=0;
                                $sno=1;
                                foreach($result as $d){?>
                                    <tr>
                                        <td><?php echo $sno?></td>
                                        <td><?php echo $d->std_date?></td>
                                        <td><?php echo $d->std_reason?></td>
                                        <td><?php echo $d->std_month?></td>
                                        <td><?php echo $d->std_payment?></td>
                                        <td><?php echo $d->std_paid?></td>
                                        <td><?php echo $d->std_remain?></td>

                                    </tr>
                                    <?php $sno++; $total_paid=$total_paid+$d->std_paid;$total_remain=$d->std_remain; } }?>
                                </tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="bg-info"><b>Total</b></td>
                                <td class="bg-info"><b><?php echo $total_paid+($total_remain); ?>.PKR</b></td>
                                <td class="bg-info"><b><?php echo $total_paid; ?>.PKR</b></td>
                                <td class="bg-info"><b><?php echo $total_remain; ?>.PKR</b></td>
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

