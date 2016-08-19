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
                 Attendance Detail
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
                        <h3 class="box-title">Attendance Detail </h3>
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
                                        <th colspan="5">
                                            <b>Attendance Detail</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>View</th>
                                    </tr>
                                    <?php
                                    $sno=1;
                                    foreach($result as $row){?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo $row->type; ?></td>
                                            <td><?php if($row->st_status==1){?>
                                                    <label class="label label-primary">
                                                        Active
                                                    </label>
                                                <?php } else{?>
                                                    <label class="label label-danger">
                                                        Deactive
                                                    </label>
                                                <?php } ?>
                                            </td>
                                            <td><a href="<?=site_url()?>otherstaff/staffattendancedetailview/<?=$row->id?>" class="btn btn-success">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $sno++; } ?>
                                     <tr>
                                         <td colspan="5" align="center"><?=$this->pagination->create_links();?></td>
                                     </tr>
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
