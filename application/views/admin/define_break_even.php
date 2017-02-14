<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?=site_url()?>expenses/">Break Even</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Break Even
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
                        <?php
                        $this->load->view('include/alert');
                        ?>
                        <h3 class="box-title">Break Even</h3>
                        <!-- <a href="<?= site_url()?>expenses/" class="pull-right"> Back</a> -->
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>admin/add_break_even_point" method="post">
                        <div class="box-body">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Enter Total Fixed Expenses</label>
                                <input type="text" name="fixed_expense" class="form-control" value="" />
                                <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                <span class="help-block with-errors" style="margin-left:10px; "></span>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Session</label>
                                <input type="text" name="session" class="form-control" value="" />
                                <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                <span class="help-block with-errors" style="margin-left:10px; "></span>
                            </div>
                            <?php
                                $i = 1;
                                foreach( $result as $teacher ){
                            ?>
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">Teacher Name</label>
                                <input type="text" name="teachers[<?= $i; ?>][teachername]" class="form-control" readonly value="<?= $teacher->name ?>" />
                                <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                <span class="help-block with-errors" style="margin-left:10px; "></span>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputEmail1">Subject Name</label>
                                <input type="text" name="teachers[<?= $i; ?>][subjectname]" class="form-control" readonly value="<?= $teacher->su_name ?>" />
                                <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                <span class="help-block with-errors" style="margin-left:10px; "></span>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Expected Students</label>
                                    <input type="text" name="teachers[<?= $i; ?>][expectedstudents]" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Class Expected Strength</label>
                                    <input type="text" name="teachers[<?= $i; ?>][classexpectedstrength]" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Seeds Share</label>
                                    <input type="text" name="teachers[<?= $i; ?>][seedsshare]" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="<?= 100 - $teacher->comission?>%" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Class Fee</label>
                                    <input type="text" name="teachers[<?= $i; ?>][classfee]" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Number Months</label>
                                    <input type="text" name="teachers[<?= $i; ?>][numbermonths]" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="<?= $teacher->duration; ?>" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <input type="hidden" name="teachers[<?= $i; ?>][b_date_created]" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="<?= date('d-M-Y'); ?>" required/>
                            <input type="hidden" name="teachers[<?= $i; ?>][b_time_created]" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="<?= date("h:i:sa"); ?>" required/>

                            <?php
                                $i++;
                                }
                            ?>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
