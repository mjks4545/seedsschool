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
                <a href="<?= site_url()?>reports/dailyreports">Daily Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Students Daily Record
            </small>
            <small style="float:right">
                <form action="<?=base_url()?>reports/daily_teacher_wise_student" method="post">
                    <input type="date" name="dailyDate">
                    <input type="submit" name="submitDate" value="submit" class="btn btn-primary btn-xs">
                </form>
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
                        <h3 class="box-title">Students Details</h3>
                        <a href="<?= site_url() ?>reports/dailyreports" class="pull-right"> Back</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Teacher Id</th>
                                <th>Teacher Name</th>
                                <th>Student id</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                 
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>

                            <?php } else {
                                $sno=1;
                                foreach($result as $row){?>
                                    <tr>
                                        <td><?php echo $row->id?></td>
                                        <td><?php echo $row->name?></td>
                                        <td><?php echo $row->student_id?></td>
                                        <td><?php echo $row->student_name?></td>
                                        <td><?php echo $row->student_email?></td>
                                         
                                        <td><?php echo $row->student_created_date?></td>

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

