<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Search Expenses
            <small><a href="<?= site_url() ?>expenses/">    Expenses</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Search Expenses
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

                        <a href="<?= site_url() ?>expenses/" class="pull-right"> Back</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <form role="form" data-toggle="validator" method="post" action="<?php echo site_url() ?>expenses/search_expenses">
                                <div class="form-group has-feedback col-sm-4 col-xs-offset-1">
                                    <label for="exampleInputEmail1">Search for Expenses</label>
                                    <input type="text" name="exp_search"  class="form-control" maxlength="50" minlength="1"
                                           placeholder="search for expenses" required/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"
                                      style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                    <input type="submit" class="btn btn-primary pull-right" value="Search Expense" name="search">
                                </div>

                            </form>


                        </div><!-- end of main row-->
                    <?php if(isset($result)){ ?>
                        <div class="row">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Paid Amount</th>
                                    <th>Paid To</th>
                                    <th>Payment Reason</th>
                                    <th>Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($result == 0) { ?>

                                <?php } else {
                                    $sno=1;
                                    foreach($result as $row){?>
                                        <tr>
                                            <td><?php echo $sno?></td>
                                            <td><?php echo $row->expense_paid_amount?></td>
                                            <td><?php echo $row->expense_paid_to?></td>
                                            <td><?php echo $row->expense_reason?></td>
                                            <td><?php echo $row->expense_created_date?></td>

                                        </tr>
                                        <?php $sno++; } }?>


                            </table>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>