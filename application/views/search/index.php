<style>
    .course {
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?= site_url() ?>admin/">Home</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Search For Some one
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
                        <h3 class="box-title">Add New Expense</h3>
                        <a href="<?= site_url() ?>expenses/" class="pull-right"> Back</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <form role="form" data-toggle="validator" method="post"
                                  action="<?php echo site_url() ?>search/std_search">
                                <div class="form-group has-feedback col-sm-4 col-xs-offset-1">
                                    <label for="exampleInputEmail1">Search for student</label>
                                    <input type="search" name="std_search" class="form-control" maxlength="50"
                                           minlength="1"
                                           placeholder="search for student" required/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"
                                      style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    <input type="submit" class="btn btn-primary pull-right" value="Search Student"
                                           name="search">
                                </div>

                            </form>


                            <form role="form" data-toggle="validator" method="post"
                                  action="<?php echo site_url() ?>search/visitor_search">
                                <div class="form-group has-feedback col-sm-4 col-xs-offset-1">
                                    <label for="exampleInputEmail1">Search for Visitor</label>
                                    <input type="text" name="visitor_search" class="form-control" maxlength="50"
                                           minlength="1"
                                           placeholder="search for Visitor" required/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"
                                      style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    <input type="submit" class="btn btn-primary pull-right" value="Search Visitor"
                                           name="search">
                                </div>

                            </form>

                        </div>
                        <!-- end of main row-->

                        <!------------------------ for result show in table student data-------------------------------------->
                        <div class="row">
                            <div class="col-sm-10 col-xs-offset-1">
                                <?php if (isset($result)) { ?>

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Student Name</th>
                                            <th>Father Name</th>
                                            <th>Contact</th>
                                            <th>Status</th>

                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sno = 1;
                                        foreach ($result as $array) { ?>
                                            <tr>
                                                <td><?= $sno ?></td>
                                                <td><?= $array->student_name ?></td>
                                                <td><?= $array->std_father_name ?></td>
                                                <td><?= $array->student_contact ?></td>
                                                <td><?php if($array->student_status==1)
                                                        {?>
                                                    <a class="btn btn-success">
                                                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;                                                        Active
                                                    </a>

                                                    <?php }?>
                                                    <?php if($array->student_status==0)
                                                        {?>
                                                    <a class="btn btn-danger">
                                                        <i class="fa fa-times-circle-o" aria-hidden="true"></i>&nbsp;Deactive
                                                    </a>

                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url() ?>student/studentdetails/<?= $array->student_id ?>"
                                                       type="button" class="btn btn-primary">
                                                        <i class="fa fa-eye" alt="View details of this Visitor"
                                                           aria-hidden="true"></i>
                                                        &nbsp;&nbsp;&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                                                </td>
                                                <td>
                                                    <a href="<?= site_url() ?>student/deletestudent/" type="button"
                                                       class="btn btn-danger">
                                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                        &nbsp;&nbsp;&nbsp;Delete</a>
                                                </td>
                                            </tr>
                                            <?php $sno++;
                                        } ?>
                                    </table>


                                <?php } else if (isset($visitor)) { ?>


                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Visitor Name</th>
                                            <th>Reason</th>
                                            <th>Contact</th>
                                            <th>Relationship</th>

                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sno = 1;
                                        foreach ($visitor as $array) { ?>
                                            <tr>
                                                <td><?= $sno ?></td>
                                                <td><?= $array->name ?></td>
                                                <td><?= $array->reason ?></td>
                                                <td><?= $array->contact ?></td>
                                                <td><?= $array->relationship ?></td>
                                                <td>
                                                    <a href="<?= site_url() ?>visitor/viewvisitordetail/<?= $array->id ?>"
                                                       type="button" class="btn btn-primary">
                                                        <i class="fa fa-eye" alt="View details of this Visitor"
                                                           aria-hidden="true"></i>
                                                        &nbsp;&nbsp;&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                                                </td>
                                                <td>
                                                    <a href="<?= site_url() ?>visitor/deletevisitor/<?= $array->id ?>"
                                                       type="button"
                                                       class="btn btn-danger">
                                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                        &nbsp;&nbsp;&nbsp;Delete</a>
                                                </td>
                                            </tr>
                                            <?php $sno++;
                                        } ?>
                                    </table>


                                <?php } ?>
                            </div>
                        </div>

                        <!------------------------ end of student data -------------------------------------->


                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>