<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Bank
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
                        <h3 class="box-title">Update Bank</h3>
                        <a href="<?= site_url()?>bank" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
    <?php foreach ($result as $row) { }?>                
                    <form role="form" data-toggle="validator" action="<?= site_url()?>bank/bankupdateprocess/<?= $row->b_id; ?>" method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control" value="<?= $row->b_name; ?>" maxlength="50" minlength="1" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Account Number</label>
                                    <input type="text" name="account_number" class="form-control" value="<?= $row->b_account_no; ?>" maxlength="50" minlength="1" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Branch</label>
                                    <input type="text" name="branch" class="form-control" value="<?= $row->b_branch; ?>" maxlength="50" minlength="1" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="form-group has-feedback col-md-5">
                                    <label for="exampleInputEmail1">Account Title</label>
                                    <input type="text" name="account_title" class="form-control" value="<?= $row->b_account_title; ?>" maxlength="50" minlength="1" id="exampleInputEmail1" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div>
                                <div> 
                                    <input type="text" name="bdate" value="<?= $row->b_date; ?>" hidden/>
                                    <input type="text" name="bmonth" value="<?= $row->b_month; ?>" hidden/>
                                    <input type="text" name="byear" value="<?= $row->b_year; ?>" hidden/>
                                    <input type="text" name="bstatus" value="<?= $row->b_status; ?>" hidden/>   
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="col-md-1"></div>
                                <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>