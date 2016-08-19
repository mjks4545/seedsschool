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
            <small><a href="<?= site_url() ?>admin/">Admin</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Students
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
                        <h3 class="box-title">Level Classes</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Subject </th>
                                <th>Teacher </th>
                                <th>Time </th>
                                <th>Status</th>
                                <th>Generate Slip </th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($class==0) {?>
                            <?php } else {
                                $sno = 1;
                                foreach ($class as $array) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $array->su_name ?></td>
                                        <td><?= $array->name ?></td>
                                        <td><?= $array->time ?></td>
                                        <td><?php  if($array->class_status==1){?>
                                                <i class="label label-success">Active</i>
                                            <?php }else{ ?>
                                                <i class="label label-danger">Deactive</i>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url() ?>student/chalanperclass/<?=$array->cl_id?>" type="button"
                                               class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Generate a Payment Slip for all Student in This Class. ">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Genarate Fee Slip</a>

                                        </td>
                                        <td>
                                            <a href="<?= site_url() ?>student/clstudent/<?=$array->cl_id?>" type="button"
                                               class="btn btn-success">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;Show All Student</a>
                                        </td>
                                    </tr>
                                    <?php $sno++;
                                }
                            } ?>
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

