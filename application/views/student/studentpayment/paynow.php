<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?php echo site_url()?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?php echo site_url()?>studentpayment/viewstd">All Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Student Fee Payment</small>
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
                        <h3 class="box-title"></h3>
                        <a href="<?= site_url()?>studentpayment/viewstd" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>studentpayment/paymonthlyfeepro" method="post">
                        <input type="hidden" name="fkclass_id" value="<?php echo $result[0]->classfee_id?>">
                        <input type="hidden" name="fkstd_id" value="<?php echo $result[0]->student_id?>">
                        <div class="box-body">
                         <?php if($checkad!=0){ ?>

                          <?php if($result[0]->std_remain<0 && $result[0]->std_remain!=''){?>
                                <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                    <div class="form-group has-feedback">
                                        <label for="exampleInputEmail1">Advance Payment</label>
                                        <?php if($result[0]->std_month==date('M')){
                                            $total =substr($result[0]->std_remain,1);
                                        } ?>
                                        <?php if($result[0]->std_month!=date('M')){
                                            $total =($result[0]->to_be_pay)+($result[0]->std_remain);
                                        } ?>
                                        <input type="text" value="<?php echo $total?>" name="total" class="form-control" maxlength="50" minlength="1"  placeholder="Advance Balance" readonly/>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    </div>
                                </div>
                            <?php }
                          else {?>

                                  <?php
                                    if($result[0]->std_remain>0 && $result[0]->std_month==date('M'))
                                    {
                                      $total_fee = ($result[0]->std_remain);
                                    }
                                    if($result[0]->std_remain>0 && $result[0]->std_month!=date('M'))
                                    {
                                      $total_fee = ($result[0]->std_remain) + ($result[0]->to_be_pay);
                                    }
                                    if($result[0]->std_remain==0 && $result[0]->std_month==date('M'))
                                    {
                                      $total_fee = ($result[0]->std_remain);
                                    }
                                    if($result[0]->std_remain==0 && $result[0]->std_month!=date('M'))
                                    {
                                      $total_fee = ($result[0]->to_be_pay);
                                    }
                                  ?>
                                    <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                        <div class="form-group has-feedback">
                                            <label for="exampleInputEmail1">Total</label>
                                            <input type="text" value="<?php echo $total_fee;?>" name="total" class="form-control" maxlength="50" minlength="1"  placeholder="Toal Balance" readonly/>

                                            <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors" style="margin-left:10px; "></span>
                                        </div>
                                    </div>
                            <?php }
                         } else{?>

                             <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                 <div class="form-group has-feedback">
                                     <label for="exampleInputEmail1">Total</label>
                                     <input type="text" value="<?php echo $result[0]->to_be_pay;?>" name="total" class="form-control" maxlength="50" minlength="1"  placeholder="Toal Balance" readonly/>

                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
                         <?php }?>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Amount Pay</label>
                                    <input type="text" name="amountpay" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" placeholder="Enter Amount" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>


                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Month</label>
                                    <select type="text" name="month" class="form-control" placeholder="Select Month" required >
                                        <option value="">Select Month</option>
                                        <option value='Jan'>Janaury</option>
                                        <option value='Feb'>February</option>
                                        <option value='Mar'>March</option>
                                        <option value='Apr'>April</option>
                                        <option value='May'>May</option>
                                        <option value='Jun'>June</option>
                                        <option value='Jul'>July</option>
                                        <option value='Aug'>August</option>
                                        <option value='Sept'>September</option>
                                        <option value='Oct'>October</option>
                                        <option value='Nov'>November</option>
                                        <option value='Dec'>December</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>


                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Year</label>
                                    <select name="year" class="form-control"  required>
                                        <?php $date = date("Y");
                                        for($i=$date-5; $i<=$date+2; $i++){ ?>
                                            <option value="<?=$i?>"><?=$i?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Reason</label>
                                    <input type="text" name="reason" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" value="Monthly Fee" readonly/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>


                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1 pull-right">Save</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>