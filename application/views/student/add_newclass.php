<style>
    .chbx {
        position: relative;
        margin-top: 30px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Student
            <small><a href="<?= site_url() ?>student/addstudent">Student Personal Info</a> <i
                    class="fa fa-chevron-circle-right" aria-hidden="true"></i> Student Classes
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <?php $this->load->view('include/alert') ?>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title text-primary ">Step-II</h2>
                        <a href="<?= site_url() ?>student/addstudent" class="pull-right"> Back</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" data-toggle="validator"
                          action="<?= site_url() ?>student/addnewclasspro/<?= $std_id; ?>" method="post">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Level</th>
                                    <th>Class Name</th>
                                    <th>Teacher Name</th>
                                    <th>Class Timing</th>
                                    <th>Class Fee</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result == 0) {
                                    ?>
                                <?php } else {
                                    $sno = 1;
                                    foreach ($result as $re) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <input type="hidden" name="class_<?php echo $sno; ?>"
                                                   value="<?php echo $re->cl_id; ?>">
                                            <input type="hidden" name="co_id" value="<?php echo $re->co_id; ?>">
                                            <input type="hidden" name="cl_fee_<?php echo $sno; ?>"
                                                   value="<?php echo $re->fee; ?>">
                                            <td><?php echo $re->co_name; ?></td>
                                            <td><?php echo $re->su_name; ?></td>
                                            <td><?php echo $re->name; ?></td>
                                            <td><?php echo $re->time ?></td>
                                            <td><?php echo $re->fee; ?></td>

                                            <td>
                                                <input type="checkbox" name="select_<?php echo $sno; ?>">
                                            </td>
                                        </tr>
                                        <?php $sno++;
                                    }
                                } ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Next
                                <div class="fa fa-angle-double-right"></div>
                            </button>
                        </div>
                    </form>

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
