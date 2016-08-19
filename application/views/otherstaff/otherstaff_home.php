<style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small>
                  <a href="<?= site_url()?>otherstaff/">Staff</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Staff
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
                        <h3 class="box-title">View Staff</h3>
                     <div class="btn-group pull-right">
                        <a href="<?= site_url() ?>otherstaff/addstaff" type="button"
                           class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Staff</a>

                         <a class="btn btn-success" href="<?= site_url()?>otherstaff/newattendence">
                             <i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;
                             Take Attendance</a>

                         <a class="btn btn-success" href="<?= site_url()?>otherstaff/todayattendance">
                             <i class="fa fa-calendar-o"></i>&nbsp;&nbsp;&nbsp;
                             View Today Attendance</a>

                         <a class="btn btn-success" href="<?= site_url()?>otherstaff/staffattendancedetail">
                             <i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;
                             Attendance Detail</a>


                     </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Employee Name</th>
                                <th>Contact Number</th>
                                <th>Employee CNIC</th>
                                <th>Employee Type</th>
                                <th>Status</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>

                            <?php if ($staff == 0) { ?>
                            <?php } else {
                                $sno=1;
                                foreach($staff as $s){?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $s->name; ?></td>
                                        <td><?php echo $s->contact; ?></td>
                                        <td><?php echo $s->cnic ?></td>
                                        <td><?php echo $s->type ?></td>

                                        <td><?php if($s->st_status  == 1 ) {?>
                                                <label class="label label-success">Active</label><?php }else{?><label class="label label-primary">Leaved</label>
                                            <?php }?></td>

                                        <td>
                                            <a href="<?=site_url()?>otherstaff/paymentdetails/<?=$s->id?>" type="button" class="btn btn-primary">
                                                <i class="fa fa-money"  alt="View details of this Visitor" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Payment Details</a>&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>    <a href="<?=site_url()?>otherstaff/viewstaffdetails/<?=$s->id?>" type="button" class="btn btn-primary">
                                                <i class="fa fa-eye"  alt="View details of this Visitor" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>    <a href="<?= site_url() ?>otherstaff/deletestaff/<?=$s->id?>" onclick="return confirm('Do You Want To Delete This?')" type="button" class="btn btn-danger">
                                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Delete</a>
                                        </td>
                                    </tr>
                                    <?php $sno++; } }?>
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

