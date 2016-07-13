<style>
    td, th{
        text-align: center;
    }
    .name{
        margin-top:10px;
    }
    .ad{
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Staff Dashboard
            <small><a href="<?= site_url()?>otherstaff/">Staff</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>otherstaff/viewstaff">View Staff</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Details</small>
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
                        <?php foreach ($staff as $staff_array) {?>
                        <h3 class="box-title">Staff Details</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-md-12 "><h3>Personal Information</h3><a href="<?= site_url()?>otherstaff/updatestaff/<?= $staff_array->id?>" style="position:relative;bottom: 30px;" class="btn btn-info pull-right" type="button">Update</a></div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Employee Name : </label><?= $staff_array->name;?></div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Contact Number : </label><?= $staff_array->contact;?></div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Employee CNIC : </label><?= $staff_array->cnic;?></div>
                            </div>
                            <div class="col-md-2">
                                <!--for spacing-->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Address : </label><?= $staff_array->address;?></div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Employee Type : </label><?= $staff_array->type;?></div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Salary : </label><?= $staff_array->salary;?></div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Date : </label><?= $staff_array->created_date;?></div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Time : </label><?= $staff_array->created_time;?></div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Email Id : </label><?= $staff_array->email;?></div>
                            </div>

                         </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Password : </label><?= $staff_array->password;?></div>
                            </div>
                           <div class="col-md-2">
                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><a href="" data-toggle="modal" data-target="#myModal">Change Password</a></div>
                            </div>
                         </div>                         
                        </div>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    
                                    <form role="form" method="post" action="<?php echo base_url('otherstaff/change_other_staff_password')?>">
                                      <div class="form-group">
                                        <label for="oldPassword">Old Password:</label>
                                        <input type="text" class="form-control" name="oldPassword" value="<?= $staff_array->password;?>">
                                        <input type="hidden" class="form-control" name="pass_id" value="<?= $staff_array->id;?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="pwd">New Password:</label>
                                        <input type="text" class="form-control" name="password">
                                      </div>
                                     
                                      <button type="submit" class="btn btn-info">Change Password</button>
                                    </form>

                                </div>
                               
                              </div> 
                            </div>
                        </div>    

                        <?php }?>

                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.box -->
</div>

</section>
</div>



