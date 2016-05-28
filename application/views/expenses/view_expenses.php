<style>
    td, th{
	text-align: center;
    }
</style>  
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daily Expenses
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
		    <h3 class="box-title">Expense History</h3>
		    <a href="<?= site_url()?>expensecontroller/add_expenses" type="button" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Expense</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                 <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>Amount</th>
			<th>Date</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
		    <?php
			foreach ( $data as $array ) { ?>
			    <tr>
				<td><?= $array->expense_id ?></td>
				<td><?= $array->expense_name ?></td>
				<td><?= $array->expenses_reason ?></td>
				<td><?= $array->expense_amount ?></td>
				<td><?= $array->created_at ?></td>
				<td>
				    <a href="<?= site_url()?>expensecontroller/edit_expenses/<?= $array->expense_id; ?>" type="button" class="btn btn-warning"> <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;&nbsp;
				    <a href="<?= site_url()?>expensecontroller/delete_expenses/<?= $array->expense_id; ?>" type="button" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a>
				</td>
			    </tr>
		    <?php } ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              


