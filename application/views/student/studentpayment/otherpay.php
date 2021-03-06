<?php
$session = $this->session->userdata('session_data');
$id= $session['id'];
$role = $session['role'];  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$role ?> Dashboard
            <?php if($role=="admin"){ ?>
            <small><a href="<?php echo site_url()?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?php echo site_url()?>studentpayment/viewstd">All Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Student Fee Payment
             </small>
            <?php } ?>
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
                        <h3 class="box-title">Other Payment</h3>
                       <div class="btn-group pull-right">
                         <?php if($role=="admin"){?>
                            <a href="<?= site_url()?>studentpayment/viewstd" class="btn btn-info"> Back</a>
                         <?php } ?>
                        <a href="<?=site_url()?>studentpayment/viewotherpaymentdetail/<?php echo $result[0]->fkstudent_id?>" class="btn btn-info pull-right">
                            <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;
                            Other Payment Detail
                        </a>
                       </div>
                    </div><!-- /.box-header -->
                    <?php if($role=="admin" || $role=="receptionist"){ ?>
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>studentpayment/payotherfeepro" method="post">
                        <input type="hidden" name="fkstd_id" value="<?php echo $result[0]->fkstudent_id?>">
                        <div class="box-body">
                        <?php if ($check != 0){?>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <?php
                                    $total_remain = 0;
                                         foreach($result as $r) {
                                        $total_remain = $total_remain+ $r->otherfee_remain;
                                         }
                                       

                                    ?>
                                    <label for="exampleInputEmail1">Balance</label>
                                    <input type="text"  value="<?php echo $total_remain; ?>" name="total_remain" class="form-control" maxlength="50" minlength="1" readonly  placeholder="Total Balance"/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                        <div class="form-group has-feedback">
                                            <label for="exampleInputEmail1">Fee to Pay</label>
                                            <input type="text"  name="total" class="form-control" maxlength="50" minlength="1"  placeholder="Total Balance"/>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors" style="margin-left:10px; "></span>
                                        </div>
                                    </div>
                         <?php }else {?>
                                   <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                        <div class="form-group has-feedback">
                                            <label for="exampleInputEmail1">Fee to Pay</label>
                                            <input type="text"  name="total" class="form-control" maxlength="50" minlength="1"  placeholder="Total Balance"/>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors" style="margin-left:10px; "></span>
                                        </div>
                                    </div>
                         <?php } ?> 
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Amount Paid</label>
                                    <input type="text" name="amountpay" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" placeholder="Enter Amount" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Reason</label>
                                    <select type="text" name="reason" class="form-control" placeholder="Select Reason" required >
                                        <option value="">Select Reason</option>
                                        <option value='Admission Fee'>Admission Fee</option>
                                        <option value='ID Card Fee'>ID Card Fee</option>
                                        <option value='Certificate Fee'>Certificate Fee</option>
                                        <option value='Certificate Fee'>Others Fee</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>


                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1 pull-right">Save</button>
                        </div>
                    </form>
                   <?php } ?>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>