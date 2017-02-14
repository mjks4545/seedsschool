<style>
    td, th {
        text-align: center;
    }

    .name {
        margin-top: 10px;
    }

    .ad {
        text-align: center;
    }
</style>
<?php $session = $this->session->userdata('session_data');
$role = $session['role']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Teacher Dashboard

            <small>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>admin">Teacher</a>
                <?php if ($role == "admin") { ?>
                <a href="<?= site_url() ?>teacher/">Teacher</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>teacher/viewteacher">View Teacher</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Details
            </small>
            <?php } ?>
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

                        <h3 class="box-title">Teacher Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php foreach ($teachers as $teacher){ ?>
                        <div class="col-md-12 "><h3>Personal Information</h3>
                            <?php if ($role == "admin" ) { ?>
                                <a
                                    href="<?= site_url() ?>teacher/updateteacher/<?= $teacher->id ?>"
                                    style="position:relative;bottom: 30px;" class="btn btn-info pull-right"
                                    type="button">Update
                                </a>
                            <?php } ?>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Teacher Name : </label><?= $teachers['0']->name; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Contact Number
                                        : </label><?= $teachers['0']->contact; ?></div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Teacher CNIC : </label><?= $teachers['0']->cnic; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Address : </label><?= $teachers['0']->address; ?>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Date : </label><?= $teachers['0']->created_date; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Time : </label><?= $teachers['0']->created_time; ?>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Gender :</label>
                                    <?= $teachers[0]->t_gender; ?>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <?php if ($role == "admin"){ ?>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Password : </label><?= $teachers['0']->password; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name">

                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Change
                                        Password </a>

                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Email :</label>
                                    <?= $teachers[0]->email; ?>
                                </div>
                            </div>

                        </div>
                        <!-- for class-->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12"><h3>Subject Information</h3>
                                <?php if ($role == "admin" || $role=="receptionist") { ?>
                                    <a
                                        href="<?= site_url() ?>teacher/add_class/<?= $teacher->id ?>"
                                        style="position:relative;bottom: 30px;" class="btn btn-info pull-right"
                                        type="button">Add Subject
                                    </a>
                                <?php } ?>
                            </div>


                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Change Teacher Password</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form method="post"
                                                  action="<?php echo base_url('teacher/change_teacher_password') ?>">
                                                <div class="form-group">
                                                    <label>Old Password:</label>
                                                    <input type="text" class="form-control" name="oldPassword"
                                                           value="<?= $teachers[0]->password; ?>" readonly />
                                                    <input type="hidden" class="form-control" name="pass_id"
                                                           value="<?= $teachers[0]->id; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password:</label>
                                                    <input type="text" name="pwd" maxlength="18" minlength="6" required class="form-control"/>
                                                </div>

                                                <button type="submit" class="btn btn-info">Change Password</button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!------------table start------------------------------------>
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover" style="margin-top:20px;">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Subject</th>
                                    <?php if($_SESSION['session_data']['role'] != 'teacher'){ ?>    
                                        <th>Percentage</th>
                                        <td>Total</td>
                                        <td>Action</td>
                                    <?php }?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($subject == 0) {
                                    } else {
                                        $sno = 1;
                                        $tID = $teachers[0]->id;
                                        foreach ($subject as $sub) {
                                            ?>
                                            <tr>

                                                <td><?= $sno; ?></td>
                                                <td><?= $sub->su_name; ?></td>
                                            <?php if($_SESSION['session_data']['role'] != 'teacher'){ ?>    
                                                <td><?= $sub->comission . "&nbsp;%"; ?></td>
                                            
                                                <?php $per = $sub->comission / 100;?>
                                                <?php $salary = $per * $teacher_pesi = $this->teacher_m->sallrypersubject($sub->t_id, $sub->su_id);?>
                                                <td><?php if ($salary == '') {
                                                    } else {
                                                        echo $salary;
                                                    } ?></td>
                                                   
                                                <td><a href="<?= base_url() ?>Teacher/editSubjectTeacher/<?= $sub->sub_id; ?>/<?= $tID; ?>" class="btn btn-warning btn-xs">Edit</a>
                                                <a href="<?= base_url() ?>Teacher/deleteSubjectTeacher/<?= $sub->sub_id; ?>/<?= $tID; ?>" class="btn btn-danger btn-xs">Delete</a></td>
                                            <?php } ?>     
                                            </tr>
                                            <?php $sno++;
                                        }
                                    } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- end of class-->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12"><h3>Class Information</h3></div>
                            <!------------table start------------------------------------>
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover" style="margin-top:20px;">
                                    <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Subject</th>
                                        <th>Class time</th>
                                        <th>Starting date</th>
                                        <th>Ending date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($academic == 0) {
                                    } else {
                                        foreach ($academic as $array) {
                                            ?>
                                            <tr>
                                                <td><?= $array->co_name ?></td>
                                                <td><?= $array->su_name ?></td>
                                                <td><?= $array->time ?></td>
                                                <td><?= $array->s_date ?></td>
                                                <td><?= $array->e_date ?></td>
                                                <td><?php if ($array->t_status == 1) { ?>
                                                        <i class="label label-success">Active</i>
                                                    <?php } else { ?>
                                                        <i class="label label-danger">Deactive</i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <!------------table end------------------------------------->

                        </div>
                        <!-- for teacher Salary Detail -->    
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <?php if($_SESSION['session_data']['role'] != 'teacher'){ ?>
                        <div class="col-md-12">
                            <h3>Remuneration Information
                                <small>
                                    <a class="btn btn-info btn-sm"
                                       href="<?= site_url() ?>teacher/paymentdetails/<?= $teacher->id ?>">Remuneration
                                        Detail</a>
                                </small>
                            </h3>
                        </div>
                        <!------------table start------------------------------------>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Amount Reason</th>
                                    <th>Paid Month</th>
                                    <th>Total Remuneration</th>
                                    <th>Paid Remuneration</th>
                                    <th>Remain Remuneration</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($result == 0) { ?>

                                <?php } else {
                                    $sno = 1;
                                    $total_salary = 0;
                                    $total_paid = 0;
                                    $total_remain = 0;
                                    foreach ($result as $t) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sno ?></td>
                                            <td><?php echo $t->created_date; ?></td>
                                            <td><?php echo $t->amount_reason; ?></td>
                                            <td><?php $t->paid_month;
                                                switch ($t->paid_month) {
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
                                            <td><?php echo $t->total_salary; ?></td>
                                            <td><?php echo $t->paid_salary; ?></td>
                                            <td><?php echo $t->remaining_salary; ?></td>
                                            <td><a class="btn btn-danger" href="<?= site_url(); ?>teacher/get_teacher_futherdetails/<?= $t->sa_id; ?>" >View Details</a></td>

                                        </tr>
                                        <?php $sno++;
                                        $total_paid = $total_paid + $t->paid_salary;
                                        $total_remain = $t->remaining_salary;
                                    }
                                } ?>
                                </tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="bg-info"><b>Total:</b></td>
                                    <td class="bg-info">
                                        <b><?php echo $total_salary = $total_paid + ($total_remain); ?></b>.PKR
                                    </td>
                                    <td class="bg-info"><b><?php echo $total_paid; ?></b>.PKR</td>
                                    <td class="bg-info"><b><?php echo $total_remain; ?></b>.PKR</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <?php } ?>
                        <!------------table end-------------------------------------->

                    </div>
                    <!-- end of teacher Salary Detail -->

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
</div>

</section>
</div>
              


