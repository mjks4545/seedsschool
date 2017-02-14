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
            Student Pay Fee
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
                        <h2 class="box-title text-primary ">Pay Fee</h2>
                        <!-- <a href="<?= site_url() ?>studentpayment/pay_fee" class="pull-right"> Back</a> -->
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" data-toggle="validator" action="<?= site_url() ?>studentpayment/pay_fee"
                          method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-9"></div>
                                <div class="form-group has-feedback col-md-3">
                                </div>
                            </div>
                            <?php
                            $i = 1;
                            foreach ($result as $data) { 
                                $j = $i - 1;
                            ?>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback col-md-2">
                                        <input type="hidden" name="student[<?php echo $i; ?>][std_cls_fee_id]"
                                               value="<?php echo $data->classfee_id; ?>">
                                        <input type="hidden" name="student[<?php echo $i; ?>][student_id]"
                                               value="<?php echo $data->fkstudent_id; ?>">
                                        <label for="exampleInputEmail1">Subject Name</label>
                                        <input type="text" name="student[<?= $i; ?>][subject_name]" readonly class="form-control"
                                               maxlength="50" minlength="1" id="exampleInputEmail1"
                                               value="<?= $data->su_name ?> - <?= $data->co_name ?>" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Amount Due</label>
                                        <input type="text" id="<?= $i ?>_student_fee"
                                               name="student[<?= $i ?>][student_fee]" class="form-control" readonly
                                               maxlength="50" minlength="1" value="<?= ( isset( $payment[$j][0] ) ) ? $payment[$j][0]->std_remain : $data->fee;?>" required/>
                                               <input type="hidden" id="<?= $i ?>_student_fee"
                                               name="student[<?= $i ?>][starting_date]" class="form-control"
                                               maxlength="50" minlength="1" value="<?= ( isset( $payment[$j][0] ) ) ? $payment[$j][0]->f_starting_date : $data->starting_date;?>"/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Amount Paid</label>
                                        <input type="text" id="<?= $i ?>" name="student[<?= $i; ?>][student_paid_fee]"
                                               class="form-control amount_paid" value="0" required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Discount</label>
                                        <input type="text" id="<?= $i ?>_discount" name="student[<?= $i; ?>][discount]"
                                               class="form-control amount_paid_discount" value="0" required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Reason</label>
                                        <select 
                                            id="<?= $i ?>_reason" 
                                            name="student[<?= $i; ?>][reason]" 
                                            class="form-control" 
                                        >
                                          <option value="#" >Select Reason</option>
                                          <option value="Scholarship" >Scholarship</option>
                                          <option value="Financially Weak" >Financially Weak</option>
                                          <option value="4 Subjects" >4 Subjects</option>
                                          <option value="By Teacher's Refrence" >By Teacher's Refrence</option>
                                          <option value="By Sir Nasir" >By Sir Nasir</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="exampleInputEmail1">Balance</label>
                                        <input type="text" id="fee_pay_<?= $i ?>" name="student[<?php echo $i; ?>][student_remaning_fee]"
                                               readonly class="form-control" value="0" maxlength="50" required/>
                                        <!-- <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span> -->
                                    </div>
                                    <div class="form-group has-feedback col-md-1">
                                        <center>
                                        <label for="exampleInputEmail1">Neglect %</label><br>
                                        <input type="checkbox" id="neglect_percentage_<?= $i ?>" name="student[<?php echo $i; ?>][neglect_percentage]"
                                               value="1" maxlength="50" />
                                        </center>
                                    </div>
                                </div>
                                <?php $i++;
                            }  ?>
                            <?php 
                        if( isset( $other_payments ) ){
                            if( $other_payments->otherfee_remain > 0 ){

                            ?>
                            <div class="col-md-12">
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Type of Fee</label>
                                        <input type="text" name="subject_name" readonly class="form-control"
                                               maxlength="50" minlength="1" id="exampleInputEmail1"
                                               value="Admission Fee" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Amount Due</label>
                                        <input type="text" id="admission_fee_due"
                                               name="admission_fee_due" class="form-control" readonly
                                               maxlength="50" minlength="1" required value="<?= $other_payments->total_amt; ?>" />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Amount Paid</label>
                                        <input type="text" id="admission_fee_paid" name="admission_fee_paid"
                                               class="form-control" value="0" required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Discount</label>
                                        <input type="text" id="admission_fee_paid_discount" name="admission_fee_paid_discount"
                                               class="form-control" value="0" required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Reason</label>
                                        <select id="admission_fee_paid_reason" name="admission_fee_paid_reason"
                                               class="form-control">
                                            <option value="#" >Select Reason</option>
                                            <option value="Scholarship" >Scholarship</option>
                                            <option value="Financially Weak" >Financially Weak</option>
                                            <option value="4 Subjects" >4 Subjects</option>
                                            <option value="By Teacher's Refrence" >By Teacher's Refrence</option>
                                            <option value="By Sir Nasir" >By Sir Nasir</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                    <div class="form-group has-feedback col-md-2">
                                        <label for="exampleInputEmail1">Balance</label>
                                        <input type="text" id="admission_fee_balance" name="admission_fee_balance"
                                               readonly class="form-control" value="0" maxlength="50" required/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                </div>
                            <?php 
                                }
                            }
                            ?>
                            <input type="hidden" value="<?= $i - 1; ?>" id="counter" name="counter" >
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <!-- for concision-->
                                    <!-- <div class="form-group has-feedback">
                                        <label for="exampleInputEmail1">Reason For Concisiom</label>
                                        <textarea type="text" name="r_c" style="height:50px;resize: none; "
                                                  class="form-control"  minlength="1" maxlength="300" required></textarea>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div> -->


                                    <!-- end for concision-->
                                </div>
                                <div class="col-md-3" style="position: relative;left: 50px;top: 10px;"><b>Total Paid Fee</b>
                                </div>
                                <div class="form-group has-feedback col-md-3">
                                    <input type="text" name="total_paid_fee" class="form-control" maxlength="50"
                                           minlength="1" placeholder="Total Fee" id="total_paid_fee" value="0" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-3" style="position: relative;left: 50px;top: 10px;"><b>Total Remaning Fee</b>
                                </div>
                                <div class="form-group has-feedback col-md-3">
                                    <input type="text" name="total_ramaining_fee" class="form-control" maxlength="50"
                                           minlength="1" placeholder="Total Fee" id="total_ramaining_fee" value="0" required/>
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
