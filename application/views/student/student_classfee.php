<style>
    .chbx {
        position: relative;
        margin-top: 30px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Student
            <small><a href="<?= site_url() ?>student/addstudent">Student Personal Info</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>student/studentclasses">Student Classes</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Student Class Fee
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <?php $this->load->view('include/alert') ?>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title text-primary ">Step-III</h2>
                        <a href="<?= site_url() ?>student/studentclasses" class="pull-right"> Back</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" data-toggle="validator" action="<?= site_url() ?>student/studentclassfeepro/"
                          method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-9"></div>
                                <div class="form-group has-feedback col-md-3">
                                    <label for="exampleInputEmail1">Admission Fee</label>
                                    <input type="text" name="admission_fee" id="add_fee" class="form-control"
                                           maxlength="50"
                                           minlength="1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <?php
                            $i = 1;
                            foreach ($result as $data) { ?>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback col-md-3">
                                        <input type="hidden" name="std_cls_fee_id_<?php echo $i; ?>"
                                               value="<?php echo $data->classfee_id; ?>">
                                        <input type="hidden" name="student_id"
                                               value="<?php echo $data->fkstudent_id; ?>">
                                        <label for="exampleInputEmail1">Subject Name</label>
                                        <input type="text" name="subject_name" readonly class="form-control"
                                               maxlength="50" minlength="3" id="exampleInputEmail1"
                                               value="<?= $data->su_name ?>" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-3">
                                        <label for="exampleInputEmail1">Subject Fee</label>
                                        <input type="text" id="subject_fee_<?= $i ?>"
                                               name="subject_fee_<?php echo $i; ?>" class="form-control" readonly
                                               maxlength="50" minlength="3" value="<?= $data->fee ?>" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-3">
                                        <label for="exampleInputEmail1">Concession</label>
                                        <input type="text" id="<?= $i ?>" name="concession"
                                               class="form-control concession" required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-3">
                                        <label for="exampleInputEmail1">Fee To Pay</label>
                                        <input type="text" id="fee_pay_<?= $i ?>" name="fee_to_pay_<?php echo $i; ?>"
                                               readonly class="form-control" value="0" maxlength="50" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                </div>
                                <?php $i++;
                            }  ?>
                            <input type="hidden" value="<?= $i - 1; ?>" id="counter" name="counter" >
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <!-- for concision-->
                                    <div class="form-group has-feedback">
                                        <label for="exampleInputEmail1">Reason For Concisiom</label>
                                        <textarea type="text" name="r_c" style="height:50px;resize: none; "
                                                  class="form-control"  minlength="1" maxlength="300" required></textarea>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>


                                    <!-- end for concision-->
                                </div>
                                <div class="col-md-3" style="position: relative;left: 50px;top: 10px;"><b>Total Fee</b>
                                </div>
                                <div class="form-group has-feedback col-md-3">
                                    <input type="text" name="total_fee" class="form-control" maxlength="50"
                                           minlength="3" placeholder="Total Fee" id="total_fee" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1 pull-right ">Finish
                            </button>
                        </div>
                    </form>

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
