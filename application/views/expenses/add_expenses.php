
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
			    <div class="row">
				<div class="form-group col-md-3">
				  <label for="exampleInputEmail1">Paid To</label>
				  <input type="text" name="expense_name_1" class="form-control" id="exampleInputEmail1" placeholder="Person Name">
				  <input type="hidden" name="number-d" class="form-control" id="number-d" placeholder="Person Name" value="1">
				</div>
				<div class="form-group col-md-3">
				  <label for="exampleInputEmail1">Reason</label>
				  <input type="text" name="expense_reason_1" class="form-control" id="exampleInputEmail1" placeholder="Reason">
				</div>
				<div class="form-group col-md-3">
				  <label for="exampleInputEmail1">Amount</label>
				  <input type="text" name="expense_amount_1" class="form-control" id="exampleInputEmail1" placeholder="Expense Amount">
				</div>
				<div class="col-md-3" style="margin-top:30px;">
				    <a id="add-another-d" href="#">
				      <span class="glyphicon glyphicon-plus"></span>
				    </a>
				</div>
			    </div>
			</div>    
                        <div id="add-another-one-d" class="col-md-12">
                            
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
              
