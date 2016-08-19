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
            <small><a href="<?= site_url() ?>teacher/">teacher</a>
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
                        <h3 class="box-title">Take Attendence</h3>
                        <a href="<?= site_url() ?>teacher/" class="pull-right"> Back</a>
                        <?php $this->load->view('include/alert'); ?>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url() ?>teacher/teachernewattendancepro" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"><!----------for space-----------></div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Select Date</label>
                                    <input type="date" name="date" class="form-control" maxlength="50" minlength="3"
                                           id="exampleInputEmail1" placeholder="Enter Date" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>

                                </div>
                            </div>
                            <div class="row">
                                <hr style="padding:0px; margin: 0px; "/>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-xs-10 col-xs-offset-1">
                                    <table class="table">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>cnic</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php
                                        $sno = 1;
                                        $st_sno = 1;
                                        foreach ($result as $att) {
                                            ?>
                                            <tr>
                                                <td><?php echo $sno; ?></td>
                                                <input type="hidden" name="t_id<?php echo $sno; ?>"
                                                       value="<?php echo $att->id; ?>">
                                                <td><?php echo $att->name; ?></td>
                                                <td><?php echo $att->cnic; ?></td>
                                                <td><select class="form-control" name="status_<?php echo $sno; ?>">
                                                        <option value="p" selected>Present</option>
                                                        <option value="a">Absent</option>
                                                        <option value="l">Leave</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php $sno++;
                                        } ?>
                                    </table>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>

                                </div>

                            </div>

                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
