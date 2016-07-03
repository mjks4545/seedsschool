<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Course
            <small><a href="<?= site_url()?>course/">Courses</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>course/viewcourses">View Courses</a>
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
                        <?php
                        $this->load->view('include/alert');
                        ?>
                        <h3 class="box-title">Add New Course</h3>
                        <a href="<?= site_url()?>course/viewcourses" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>course/addcoursepro" method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Course Title</label>
                                    <input type="text" name="course_title" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Course Title" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>