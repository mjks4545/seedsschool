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
<?php
$session = $this->session->userdata('session_data');
$id= $session['id'];
$role = $session['role'];  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$role?> Dashboard

            <?php
            foreach ($result as $data) {
                if($role=="admin" || $role=="director" ){?>
            <small><a href="<?= site_url() ?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>student/viewstudents/<?= $data->student_id?>">View Student</a>
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

                        <h3 class="box-title">Student Details</h3>
                        <?php if($role=="admin" || $role=="director"){?>
                        <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Upload Image</button>
                        <!-- for student img-->
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title text-primary">Image Upload</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-offset-1">
                                                <form action="<?= site_url() ?>student/img_upload/<?=$data->student_id?>" enctype="multipart/form-data" method="post">
                                                    <label class="text-primary">Image</label>
                                                    <input type="file"  name="img" class="form-control" style="border:1px solid; " required>
                                                    <hr/>
                                                    <input type="submit" class="btn btn-primary pull-right" name="submit" value="Upload">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- for student img-->
                        <?php } ?>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="form-group col-sm-offset-5">
                            <?php if($data->pic==''){ ?>
                                <img src="<?php echo site_url() ?>/public/user_img/user.jpg" class="img-circle"  alt="my pic" width="180" height="180">
                            <?php } else{ ?>
                                <img src="<?php echo site_url() ?>/public/user_img/<?=$data->pic?>" class="img-circle" alt="my pic" width="180" height="180">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 "><hr></div>
                    <!-- /.box-header -->
                    <div class="box-body">

                            <div class="col-md-12 "><h3>Personal Information</h3>
                                <?php if($role=="admin" || $role=="director" ){?>
                                <a href="<?= site_url()?>student/updatestudent/<?= $data->student_id?>"style="position:relative;bottom: 30px;" class="btn btn-info pull-right" type="button">Update</a>
                                <?php } ?>
                            </div>

                            <div class="col-md-12 col-sm-offset-1">
                                <!-- general form elements -->

                                <div class="col-md-4">
                                    <div class="form-group name"><label>Registration No : </label> <?= $data->student_id?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Name : </label> <?= $data->student_name?>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-sm-offset-1">
                                <!-- general form elements -->
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Father Name : </label> <?= $data->std_father_name?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Facebook Id : </label> <?= $data->facebook_id?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 col-sm-offset-1">
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Contact : </label> <?= $data->student_contact?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group name"><label>Guardian Contact: </label> <?= $data->std_guardian_contact?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-offset-1">
                                <!-- general form elements -->

                                <div class="col-md-4">
                                    <div class="form-group name"><label>Previous Institute: </label> <?= $data->current_school?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group name"><label> Email: </label> <?= $data->student_email?>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12 col-sm-offset-1">
                            <div class="col-md-4">
                                <div class="form-group name"><label>Gender: </label> <span class="text-capitalize"> <?= $data->s_gender?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>CNIC: </label> <?= $data->s_cnic?>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-offset-1">
                                <div class="col-md-4">
                                    <div class="form-group name"><label>Address : </label> <?= $data->student_address?>
                                    </div>
                                </div>
                            <div class="col-md-4">
                                    <div class="form-group name">
                                        <label>Reason of Concision: </label>
                                        <p><?= $data->reason_concision?></p>
                                    </div>
                                </div>

                            </div>
                        <?php }?>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12 ">
                            <h3>Subject Information
                                <?php if($role=="admin" || $role=="director" ){?>
                                &nbsp;<a class="btn btn-info btn-xs" href="<?php echo site_url("student/add_newclass/".$data->student_id); ?>">
                                    Add New class
                                </a>
                            <?php } ?>
                            </h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Level</th>
                                <th>Subject Title</th>
                                <th>Teacher Name</th>
                                <th>Class Timing</th>
                                <th>Fee</th>
                                <th>Attendence / Home work</th>
                                <th>View Result</th>
                                <?php if($role=="admin" || $role=="director" ){?>
                                <th colspan="2" class="text-center">Actions</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $total=0;
                            if($class == 0) {?><?php } else {
                                $sno=1;
                            foreach ($class as $cls)
                            {?>
                            <tr>
                                <td><?= $sno;?></td>
                                <td><?= $cls->co_name;?></td>
                                <td><?= $cls->su_name?></td>
                                <td><?= $cls->name?></td>
                                <td><?= $cls->time?></td>
                                <td><?= $cls->to_be_pay?></td>
                                <td><a class="btn  btn-xs btn-info" href="<?php echo site_url()?>studentattendance/attendancedetail/<?=$cls->fkstudent_id.'/'. $cls->fkclass_id.'/'.$cls->co_id?>">Attendance Detail</a></td>
                                <td><a class="btn  btn-xs btn-info" href="<?php echo site_url()?>examination/result_for_student/<?=$cls->fkstudent_id.'/'. $cls->fkclass_id.'/'.$cls->co_id?>">View Result</a></td>
                                <?php if($role=="admin" || $role=="director" ){?>
                                <td>
                                  <?php if($cls->st_class_fee_status==1){ ?>
                                    <a href="<?= site_url() ?>student/studentclassstatus/<?php echo $cls->fkstudent_id.'/0/'.$cls->classfee_id;?>"  type="button" class="btn btn-success">
                                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                        &nbsp;&nbsp;&nbsp;Active</a>
                                  <?php } else { ?>
                                    <a href="<?= site_url() ?>student/studentclassstatus/<?php echo $cls->fkstudent_id.'/1/'.$cls->classfee_id; ?>"  type="button" class="btn btn-danger">
                                        <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                        &nbsp;&nbsp;&nbsp;Deactive</a>
                                <?php  }?>
                                </td>
                                <td>
                                    <?php if($cls->class_left == 0){ ?>
                                        <a href="<?= site_url() ?>student/student_class_left/<?php echo $cls->fkstudent_id.'/1/'.$cls->classfee_id; ?>"  type="button" class="btn btn-warning">
                                            <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                            &nbsp;&nbsp;&nbsp;Mark as Left</a>
                                    <?php } else { ?>
                                        <a href="<?= site_url() ?>student/student_class_left/<?php echo $cls->fkstudent_id.'/0/'.$cls->classfee_id; ?>"  type="button" class="btn btn-danger">
                                            <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                            &nbsp;&nbsp;&nbsp;Left</a>
                                    <?php  }?>    
                                </td>
                                <?php } ?>
                            </tr>
                            <?php $total=$total+$cls->to_be_pay; $sno++; }?>
                            <?php }?>
                         </tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total:</td>
                                <td><?=$total?>.PKR</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                         <div class="col-md-12"><hr></div>
                         <?php if($role=="admin" || $role=="director" ){?>
                        <div class="col-md-12 "><h3>Financial Information
                                <a class="btn btn-info btn-xs" href="<?php echo site_url().'studentpayment/studentclass/'.$data->student_id; ?>">Payment Detail</a>
                            </h3>
                        </div>
                        <?php } ?>
                        <div class="col-md-12"><h4><b>Monthly Fee<b></h4>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Total Paid Amount</th>
                                <th>Remaining Amount</th>
                                <th>Advance Amount</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <?php $sno=1;?>
                                    <td><?php echo $sno;?></td>
                                <td><?php echo $date =$this->student_m->monthlyfeedate
                                    ($result[0]->student_id)?></td>
                                    <td><?php echo $paid =$this->student_m->monthlyfeedetails
                                    ($result[0]->student_id)?></td>
                                    <?php
                                        $remain =$this->student_m->monthlyfeeremaining
                                        ($result[0]->student_id);
                                    ?>

                                        <td>
                                            <?php
                                              if($remain > 0) { echo $remain;}
                                              else { echo 0;}
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                              if($remain < 0) { echo substr($remain,1);
                                              }
                                              else { echo 0;}
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= site_url(); ?>student/get_complete_payment_details/<?= $this->uri->segment(3); ?>"> View Details
                                        </td>
                            </tr>
                        </table>

                        <div class="col-md-12"><h4><b>Other Fee<b></h4>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Total Paid Amount</th>
                                <th>Remaining Amount</th>
                                <th>Advance Amount</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <?php $sno=1;?>
                                <td><?php echo $sno ?></td>
                                <td><?php echo $date =$this->student_m->otherfeedate
                                    ($result[0]->student_id)?>
                                </td>
                                <td><?php echo $paid =$this->student_m->otherfeedetails
                                    ($result[0]->student_id)?></td>
                                <?php
                                        $remain =$this->student_m->otherfeeremaining
                                        ($result[0]->student_id);?>
                                         <td>
                                            <?php
                                              if($remain > 0) { echo $remain;}
                                              else { echo 0;}
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                              if($remain < 0) { echo substr($remain,1);
                                              }
                                              else { echo 0;}
                                            ?>
                                        </td>


                            </tr>
                        </table>



    </section>
</div>




