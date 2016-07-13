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
            <small><a href="<?= site_url()?>Academic/">Academic</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Courses
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
                        <h3 class="box-title">View Courses</h3>
                        <a href="<?= site_url() ?>course/addcourseview" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add Course</a>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Course Id</th>
                                <th>Course Title</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($result as $course){?>
                                    <tr>
                                        <td><?php echo $course->co_id; ?></td>
                                        <td><?php echo $course->co_name; ?></td>
                                        <td><?php echo $course->created_date; ?></td>
                                        <td><?php echo $course->created_time; ?></td>
                                        <td>
                                            <a href="<?=site_url()?>course/updatecourse/<?= $course->co_id?>" type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Edit
                                            </a>
                                            <a href="<?= site_url() ?>course/deletecourse/<?= $course->co_id?>" onclick="return confirm('Do You Want To Delete This?')" type="button" class="btn btn-danger">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </tbody>

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

