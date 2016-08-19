<?php
$session = $this->session->userdata('session_data');
$id = $session['id'];
$role = $session['role']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <span class="text-capitalize"><?= $role; ?></span>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">View Teachers</h3>

                        <div class="btn-group pull-right">
                            <?php if ($role == "admin" || $role == "receptionist") { ?>
                                <?php if ($role == "admin") { ?>
                                    <a href="<?= site_url() ?>teacher/teachernewattendance" type="button"
                                       class="btn btn-success"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Take
                                        Attendance</a>

                                    <a href="<?= site_url() ?>teacher/todayattendance" type="button"
                                       class="btn btn-success"><i class="fa fa-building-o"></i>&nbsp;&nbsp;&nbsp;View
                                        Today Attendance</a>
                                    <a href="<?= site_url() ?>teacher/teacher_attendance_detail" type="button"
                                       class="btn btn-success"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Attendance
                                        Detail</a>
                                <?php } ?>
                                <a href="<?= site_url() ?>teacher/addteacher" type="button"
                                   class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Teacher</a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Teacher Name</th>
                                    <th>Contact Number</th>
                                    <th>Teacher CNIC</th>
                                    <th>Address</th>
                                    <?php if ($role == "admin") { ?>
                                        <th>Status</th>
                                    <?php } ?>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($teachers == 0) { ?>
                                <?php } else {
                                    $sno = 1;
                                    foreach ($teachers as $t) {
                                        ?>
                                        <?php if ($role == "admin" || $role == "receptionist") { ?>
                                            <tr>
                                                <td><?php echo $sno; ?></td>
                                                <td><?php echo $t->name; ?></td>
                                                <td><?php echo $t->contact; ?></td>
                                                <td><?php echo $t->cnic ?></td>
                                                <td><?php echo $t->address; ?></td>
                                            <?php if ($role=="admin") { ?>
                                                <td><?php if ($t->t_status == 1) { ?>
                                                        <a href="<?= site_url() ?>teacher/status/0/<?= $t->id ?>"
                                                           class="btn btn-success btn-sm ">
                                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                            &nbsp;Active</a>
                                                    <?php } else { ?>
                                                        <a href="<?= site_url() ?>teacher/status/1/<?= $t->id ?>"
                                                           class="btn btn-danger btn-sm">
                                                            <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                            &nbsp;Deactive</a>
                                                    <?php } ?>
                                                </td>
                                                <?php } ?>
                                                <td>
                                                    <a href="<?= site_url() ?>teacher/viewteacherdetails/<?= $t->id ?>"
                                                       type="button" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" alt="View details of this Visitor"
                                                           aria-hidden="true"></i>
                                                        &nbsp;&nbsp;&nbsp;View Details</a>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url() ?>teacher/paymentdetails/<?= $t->id ?>"
                                                       type="button"
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fa fa-money" alt="View details of this Visitor"
                                                           aria-hidden="true"></i>
                                                        &nbsp;&nbsp;Payment Details</a>
                                                </td>
                                            <?php if ($role=="admin") { ?>
                                                <td>
                                                    <a href="<?= site_url() ?>teacher/deleteteacher/<?= $t->id ?>"
                                                       onclick="return confirm('Do You Want To Delete This?')"
                                                       type="button"
                                                       class="btn btn-danger btn-sm">
                                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                        &nbsp;&nbsp;&nbsp;Delete</a>
                                                </td>
                                              <?php } ?>
                                            </tr>
                                        <?php }
                                        if ($t->id == $id && $role == "teacher") { ?>
                                            <tr>
                                                <td><?php echo $sno; ?></td>
                                                <td><?php echo $t->name; ?></td>
                                                <td><?php echo $t->contact; ?></td>
                                                <td><?php echo $t->cnic ?></td>
                                                <td><?php echo $t->address; ?></td>
                                                <td>
                                                    <a href="<?= site_url() ?>teacher/viewteacherdetails/<?= $t->id ?>"
                                                       type="button" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" alt="View details of this Visitor"
                                                           aria-hidden="true"></i>
                                                        &nbsp;&nbsp;&nbsp;View Details</a>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url() ?>teacher/paymentdetails/<?= $t->id ?>"
                                                       type="button"
                                                       class="btn btn-primary btn-sm">
                                                        <i class="fa fa-money" alt="View details of this Visitor"
                                                           aria-hidden="true"></i>
                                                        &nbsp;&nbsp;Payment Details</a>
                                                </td>
                                            </tr>
                                            <?php $sno++;
                                        }
                                    }
                                } ?>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>


