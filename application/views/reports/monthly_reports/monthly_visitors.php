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
                Visitor Weekly Record
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
                        <h3 class="box-title">Visitor Details</h3>
                        <a href="<?= site_url() ?>reports/weeklyreports" class="pull-right"> Back</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Visitor Name</th>
                                <th>Contact</th>
                                <th>Reason</th>
                                <th>Address</th>
                                <th>Relationship</th>
                                <th>Time</th>
                                <th>Date</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>

                            <?php } else {
                                $sno=1;
                                foreach($result as $row){?>
                                    <tr>
                                        <td><?php echo $sno?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['contact']?></td>
                                        <td><?php echo $row['reason']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['relationship']?></td>
                                        <td><?php echo $row['time']?></td>
                                        <td><?php echo $row['date']?></td>

                                    </tr>
                                    <?php $sno++; } }?>
                            

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

