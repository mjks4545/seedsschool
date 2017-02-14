<style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?= site_url()?>reports/">Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>reports/dailyreports">Daily Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Balance
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
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Balance Form</h3>

                        <a href="<?= site_url() ?>reports/dailyreports" class="pull-right"> Back</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="<?= base_url() ?>reports/daily_balance_process">
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="stname" placeholder="Student name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Father Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="fstname" placeholder="Father name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Unpaid</label>
                            <div class="col-sm-7">
                              <select name="unpaid" class="form-control" required>
                                  <option value="">Select</option>
                                  <option value="1">Montly fee</option>
                                  <option value="2">Addmission fee</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">From</label>
                            <div class="col-sm-7">
                              <input type="date" name="fromDate" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-2 control-label">To</label>
                            <div class="col-sm-7">
                              <input type="date" name="toDate" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-4">
                              <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                          </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

