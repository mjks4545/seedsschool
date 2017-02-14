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
            <small><a href="<?= site_url()?>expenses/">Expenses</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Expenses Details
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
                        <h3 class="box-title">Expenses Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                       <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Expense Head</th>
                                    <td><?= $expense_reason; ?></td>
                                </tr>
                                <tr>
                                    <th>Paid To</th>
                                    <td><?= $expense_paid_to; ?></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td><?= $expense_paid_amount; ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= $expense_head; ?></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td><?= $expense_created_date; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

