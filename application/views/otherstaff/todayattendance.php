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
            <small><a href="<?= site_url() ?>otherstaff/">Staff</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Add New Attendence
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
                        <h3 class="box-title">Today Attendence</h3>
                        <a href="<?= site_url() ?>otherstaff/" class="pull-right"> Back</a>
                        <?php $this->load->view('include/alert'); ?>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                     <div class="row">
                       <div class="col-sm-10 col-xs-offset-1">
                        <table class="table">
                            <tr>
                                <th colspan="4">
                                    <b>Today Attendance Record</b>
                                   <b class="pull-right">Date&nbsp;:&nbsp;<?php echo date("d-M-Y");?></b>
                                </th>
                            </tr>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Update</th>
                            </tr>
                            <?php
                            $sno=1;
                            foreach($attend as $at){?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $at->name; ?></td>
                                    <td><?php echo $at->status; ?></td>
                                    <td><a href="" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;Update</a> </td>
                                </tr>
                            <?php $sno++; } ?>
                        </table>

                    </div>
                </div>
              </div>
             </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
