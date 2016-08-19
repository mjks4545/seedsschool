<!--<style>
    td, th {
        text-align: center;
    }
</style>-->
<?php $session = $this->session->userdata('session_data');
      $id= $session['id']; $role = $session['role'];?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <span class="text-capitalize"><?=$role; ?></span>
            Dashboard
              <small><a href="<?= site_url() ?>studentattendance/allcourse">All Courses</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
               Attendence
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
                        <h3 class="box-title text-capitalize">Teacher Name: &nbsp;
                            <?php if($result!= 0) {
                                echo $result[0]->name;
                            } ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start --><?php if($result!=0){?>
                    <form role="form" data-toggle="validator"
                          action="<?= site_url() ?>studentattendance/takeattendacepro/<?= $result[0]->co_id;?>/<?= $result[0]->fkclass_id;?>"
                          method="post">
                        <?php }else{ ?>
                        <form role="form" data-toggle="validator"
                              action="#"
                              method="post">
                            <?php }?>
                        <div class="box-body">
                            <!-- for date-->
                            <div class="row">
                                <div class="form-group has-feedback col-sm-5 col-xs-6">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="date" name="date" class="form-control" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <!-- end date-->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result == 0) { ?>
                                <?php } else {
                                    $sno = 1;
                                    foreach ($result as $array) { ?>
                                        <input type="text" class="hidden" name="student_id_<?=$sno?>" value="<?=$array->student_id?>"/>
                                        <tr>
                                            <td><?= $sno ?></td>
                                            <td><?= $array->student_name ?></td>
                                            <td><?= $array->std_father_name ?></td>
                                            <td>
                                                <!-- for status-->
                                                <div class="form-group has-feedback">
                                                    <select name="status_<?= $sno; ?>" class="form-control" required>
                                                        <option value="p">Present</option>
                                                        <option value="a">Absent</option>
                                                        <option value="l">Leave</option>
                                                        <option value="la">Late</option>
                                                    </select>
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                          style="margin-right: 20px;"></span>
                                                    <span class="help-block with-errors"
                                                          style="margin-left:10px; "></span>
                                                </div>
                                                <!-- end of status-->
                                            </td>
                                            <input type="hidden" name="total_num" value="<?=$sno?>"/>

                                        </tr>
                                        <?php $sno++;
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-xs-offset-1">
                                <input type="hidden" name="teacher_id" value="<?= $result[0]->id; ?>"/>
                                <input type="hidden" name="class_id" value="<?= $result[0]->cl_id; ?>"/>
                                <input type="submit" class="btn btn-success btn-block pull-right"/>
                            </div>
                        </div>
                        <br/>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

