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
                <a href="<?= site_url()?>reports/weeklyreports">Yearly Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Students Yearly Record
            </small>
            <small style="float:right">
                <form action="<?=base_url()?>reports/yearlyStudent" method="post">
                    <select name="years">
                        <option>Select Year</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
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
                        <a href="<?= site_url() ?>reports/yearlyreports" class="pull-right"> Back</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Student Name</th>
                                <th>Father Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Facebook Id</th>
                                <th>Current School</th>
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
                                        <td><?php echo $row['student_name']?></td>
                                        <td><?php echo $row['std_father_name']?></td>
                                        <td><?php echo $row['student_contact']?></td>
                                        <td><?php echo $row['student_email']?></td>
                                        <td><?php echo $row['student_address']?></td>
                                        <td><?php echo $row['facebook_id']?></td>
                                        <td><?php echo $row['current_school']?></td>
                                        <td><?php echo $row['student_created_date']?></td>

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

