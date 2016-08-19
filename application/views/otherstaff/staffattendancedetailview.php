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
                                        <th colspan="4">
                                            <b>Monthly Record</b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <td>Present</td>
                                        <td>Absent</td>
                                        <td>Leave</td>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Attendance Percentage</th>
                                    </tr>
                                    <?php
                                    $sno=1;
                                    foreach($result as $row){?>
                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo $p =$this->otherstaff_m->num_status($row->sta_id,$row->month,$row->year,'p') ?></td>
                                            <td><?php echo $a =$this->otherstaff_m->num_status($row->sta_id,$row->month,$row->year,'a') ?></td>
                                            <td><?php echo $l =$this->otherstaff_m->num_status($row->sta_id,$row->month,$row->year,'l') ?></td>
                                            <td><?php echo $row->month; ?></td>
                                            <td><?php echo $row->year; ?></td>
                                            <td><?php echo (($p*100)/30).'&nbsp;%'; ?></td>
                                            <!--<td><a href="<?/*=site_url()*/?>otherstaff/staffattendancedetailview/<?/*=$row->id*/?>" class="btn btn-success">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </td>-->
                                        </tr>
                                        <?php $sno++; } ?>
                                    <tr>
                                        <td colspan="8">
                                            <?=$this->pagination->create_links();?>
                                        </td>
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
