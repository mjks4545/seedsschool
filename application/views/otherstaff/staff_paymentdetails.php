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
            <small><a href="<?= site_url()?>otherstaff/">Staff</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>otherstaff/viewstaff">View Staff</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Staff Payment Details
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
                        <a href="<?= site_url() ?>otherstaff/paysalary/<?=$id?>" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Pay Salary</a>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Employee Name</th>
                                <th>Total Salary</th>
                                <th>Paid Salary</th>
                                <th>Remain Salary</th>
                                <th>Amount Reason</th>
                                <th>Paid Month</th>
                                <th>Date</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>
                                <tr>
                                    <td colspan="9">No Staff Found</td>
                                </tr>
                            <?php } else {
                                $sno=1;
                                foreach($result as $staff){?>
                                    <tr>
                                        <td><?php echo $sno ?></td>
                                        <td><?php echo $staff->name; ?></td>
                                        <td><?php echo $staff->total_salary; ?></td>
                                        <td><?php echo $staff->paid_salary; ?></td>
                                        <td><?php echo $staff->remaining_salary; ?></td>
                                        <td><?php echo $staff-> amount_reason; ?></td>
                                        <td><?php  $staff->paid_month;
                                            switch ($staff->paid_month) {
                                                case 1:
                                                    echo 'Jan';
                                                    break;
                                                case 2:
                                                    echo 'Feb';
                                                    break;
                                                case 3:
                                                    echo 'Mar';
                                                    break;
                                                case 4:
                                                    echo 'Apr';
                                                    break;
                                                case 5:
                                                    echo 'May';
                                                    break;
                                                case 6:
                                                    echo 'Jun';
                                                    break;
                                                case 7:
                                                    echo 'Jul';
                                                    break;
                                                case 8:
                                                    echo 'Aug';
                                                    break;
                                                case 9:
                                                    echo 'Sep';
                                                    break;
                                                case 10:
                                                    echo 'Oct';
                                                    break;
                                                case 11:
                                                    echo 'Nov';
                                                    break;
                                                case 12:
                                                    echo 'Dec';
                                                    break;
                                            }?></td>
                                        <td><?php echo $staff-> created_date; ?></td>

                                    </tr>
                                    <?php $sno++; } }?>
                            <tr>
                                <td colspan="8">
                                    <?php echo $this->pagination->create_links(); ?>
                                </td>
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