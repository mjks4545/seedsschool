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
            <small><a href="<?=site_url()?>expenses/">Expenses</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Add Expenses
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
                        <h3 class="box-title">Add New Expense</h3>
                        <a href="<?= site_url()?>expenses/" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>expenses/addexpensespro" method="post">
                        <div class="box-body">
                            
                                <div class="form-group has-feedback col-sm-6 col-sm-offset-3">
                                    <label for="exampleInputEmail1">Reason</label>
                                    <input type="text" name="reason" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Reason" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-sm-6 col-sm-offset-3">
                                    <label for="exampleInputEmail1">Paid To</label>
                                    <input type="text" name="paid_to" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Paid To" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-sm-6 col-sm-offset-3">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" name="amount" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Paid Amount" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            <div class="form-group has-feedback col-sm-6 col-sm-offset-3">
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
                            <div class="form-group has-feedback col-sm-6 col-sm-offset-3">
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
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>