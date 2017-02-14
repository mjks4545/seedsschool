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
            Teacher Pay Salary
<!--            <small><a href="<?= site_url() ?>student/addstudent">Student Personal Info</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>student/studentclasses">Student Classes</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Student Class Fee
            </small>-->
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
                        <h2 class="box-title text-primary ">Pay Salary</h2>
                        <!-- <a href="<?= site_url() ?>studentpayment/pay_fee" class="pull-right"> Back</a> -->
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" data-toggle="validator" action="<?= site_url() ?>teacher/teacher_payments"
                          method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-9"></div>
                                <div class="form-group has-feedback col-md-3">
                                    <!-- <label for="exampleInputEmail1">Admission Fee</label>
                                    <input type="text" name="admission_fee" id="add_fee" class="form-control"
                                           maxlength="50"
                                           minlength="1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span> -->
                                </div>
                            </div>
                            <?php
                            $i = 1;
                            $total = 0;
                            foreach ($result as $data) { 
                                $j = $i - 1;
                                if( $data->payment != null ){
                            ?>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback col-md-3">
                                        <input type="hidden" name="student[<?php echo $i; ?>][std_cls_fee_id]"
                                               value="<?php echo $data->classfee_id; ?>">
                                        <input type="hidden" name="student[<?php echo $i; ?>][student_id]"
                                               value="<?php echo $data->fkstudent_id; ?>">
                                        <label for="exampleInputEmail1">Student Name</label>
                                        <input type="text" name="student[<?= $i; ?>][student_name]" readonly class="form-control"
                                               maxlength="50" minlength="1" id="exampleInputEmail1"
                                               value="<?= $data->student_name ?>" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-3">
                                        <label for="exampleInputEmail1">Subject Name</label>
                                        <input type="text" id="<?= $i ?>_student_fee"
                                               name="student[<?= $i ?>][subject_name]" class="form-control" readonly
                                               maxlength="50" minlength="1" value="<?= $data->su_name; ?>" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <?php $v = 1;?>
                                    <?php foreach( $data->payment as $payment ){ ?>
                                        <?php
                                        if( $payment->std_paid <= 0 ){
                                            continue;
                                        }
                                        ?>
                                        <?php if( $v != 1 ){ ?>
                                            <div class="col-md-3" ></div>
                                            <div class="col-md-3" ></div>
                                        <?php } ?>
                                        <?php if( $payment->neglect_teacher_percentage == 0 ){ 
                                            $teacher_payment = ($data->comission/100) * $payment->std_paid;
                                            $total += $teacher_payment;
                                        }else{
                                            $teacher_payment = $payment->std_paid;
                                            $total += $teacher_payment;
                                        }?>    
                                        <div class="form-group has-feedback col-md-2">
                                            <label for="exampleInputEmail1">Amount to be Paid</label>
                                            <input type="text" id="<?= $i ?>" name="student[<?= $i; ?>][payment][<?=$v-1?>][amount_to_paid]"
                                                   class="form-control amount_paid" value="<?= $teacher_payment ?>" required />
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                  style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors" style="margin-left:10px; "></span>
                                        </div>
                                        <div class="form-group has-feedback col-md-2">
                                            <label for="exampleInputEmail1">Paid Date</label>
                                            <input type="text" id="<?= $i ?>" name="student[<?= $i; ?>][payment][<?=$v-1?>][paid_amount]"
                                                   readonly class="form-control amount_paid" value="<?= $payment->std_date ?>" required />
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                  style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors" style="margin-left:10px; "></span>
                                        </div>
                                        <div class="form-group has-feedback col-md-2">
                                            <center>
                                                <label for="exampleInputEmail1">Amount Paid</label><br>
                                                <input type="checkbox" id="<?= $i ?>" name="student[<?= $i; ?>][payment][<?=$v-1?>][amount_paid]"
                                                        value="<?= $payment->p_id ?>" />
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                      style="margin-right: 20px;"></span>
                                                <span class="help-block with-errors" style="margin-left:10px; "></span>
                                            </center>
                                        </div>
                                    <?php $v++;} ?>
                                </div>
                                <?php $i++;
                            }}  ?>
                            <input type="hidden" name="total" value="<?= $total; ?>">
                            <input type="hidden" name="t_id" value="<?= $result[0]->t_id; ?>">
                            <input type="hidden" value="<?= $i - 1; ?>" id="counter" name="counter" >
<!--                            <div class="col-md-12">
                                <div class="col-md-6">
                                     end for concision
                                </div>
                                <div class="col-md-3" style="position: relative;left: 50px;top: 10px;"><b>Total Paid Fee</b>
                                </div>
                                <div class="form-group has-feedback col-md-3">
                                    <input type="text" name="total_paid_fee" class="form-control" maxlength="50"
                                           readonly minlength="1" placeholder="Total Fee" id="total_paid_fee" value="0" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-3" style="position: relative;left: 50px;top: 10px;"><b>Total Remaning Fee</b>
                                </div>
                                <div class="form-group has-feedback col-md-3">
                                    <input type="text" name="total_ramaining_fee" class="form-control" maxlength="50"
                                           readonly minlength="1" placeholder="Total Fee" id="total_ramaining_fee" value="0" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>-->
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
