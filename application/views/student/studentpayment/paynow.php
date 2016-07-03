<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small>Student
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
                        <a href="<?= site_url()?>teacher/" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>student/" method="post">
                        <div class="box-body">
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Total</label>
                                    <?php if($checkad==0){
                                        $tobepay=$result[0]->to_be_pay;
                                        $add_fee=$result[0]->admission_fee;
                                        $total_pay = $tobepay+$add_fee;
                                            ?>
                                        <input type="text" value="<?php echo $total_pay; ?>" name="total" class="form-control" maxlength="50" minlength="1"  placeholder="Toal Balance" required/>
                                    <?php } ?>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>


                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Amount Pay</label>
                                    <input type="text" name="amountpay" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>


                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Month</label>
                                    <input type="text" name="month" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>


                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1">Reason</label>
                                    <input type="text" name="reason" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name" required/>
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