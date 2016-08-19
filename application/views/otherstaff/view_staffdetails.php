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
                                <div class="form-group name"><label>Remuneration : </label><?= $staff_array->salary;?></div>
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
                        <!-- for payment details-->
                         <div class="row">
                             <div class="col-sm-12">
                                 <hr/>
                              <h3>Staff Payment Detail
                                <a class="btn btn-info btn-sm" href="<?=site_url()?>otherstaff/paymentdetails/<?= $staff_array->id?>">Remuneration Detail</a>
                              </h3>
                             </div>
                             <div class="col-sm-12">
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
                                         $sno=1;
                                         $total_salary=0;
                                         $total_paid=0;
                                         $total_remain=0;
                                         foreach($result as $staff){?>
                                             <tr>
                                                 <td><?php echo $sno ?></td>
                                                 <td><?=$staff->created_date?></td>
                                                 <td><?php echo $staff-> amount_reason; ?></td>
                                                 <td><?php  $staff->paid_month;
                                                     switch ($staff->paid_month) {
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

                                                 <td><?php echo $staff->total_salary; ?></td>
                                                 <td><?php echo $staff->paid_salary; ?></td>
                                                 <td><?php echo $staff->remaining_salary; ?></td>
                                                 </tr>
                                             <?php $sno++;   $total_paid = $total_paid+$staff->paid_salary;
                                             $total_remain = $staff->remaining_salary;
                                         } }?>
                                     </tbody>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td class="bg-info"><b>Total:</b></td>
                                         <td class="bg-info"><b><?php echo $total_salary = $total_paid+($total_remain); ?></b>.PKR</td>
                                         <td class="bg-info"><b><?php echo $total_paid; ?></b>.PKR</td>
                                         <td class="bg-info"><b><?php echo $total_remain; ?></b>.PKR</td>
                                     </tr>
                                 </table>
                             </div>
                         </div>
                        <!-- end of  payment details-->
                        </div>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Change Password of <?= $staff_array->name;?></h4>
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
                                        <input type="text" class="form-control" value="<?= $staff_array->password;?>" name="password">
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



