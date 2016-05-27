
<style>
 
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add expenses
            
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
                  <h3 class="box-title">Add New expense</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= site_url()?>expensecontroller/create_expense_after_post" method="post">
                  <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="expense_name" class="form-control" id="exampleInputEmail1" placeholder="Expense Reason">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="exampleInputEmail1">Amount</label>
                              <input type="text" name="expense_amount" class="form-control" id="exampleInputEmail1" placeholder="Expense Amount">
                            </div>
                            <div class="col-md-2" style="margin-top:30px;">
                                <a href="#">
                                  <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </div>
                        </div> 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                  </div>
                  </form>
                </div><!-- /.box -->
                </div>
              </div>
            </section>
            </div>
              
