

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
                        <a href="<?= site_url() ?>expenses/addexpenses" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Expenses</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                       <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <h4 class="text-center" style="padding:10px; ">Daily Expenses of <?php echo date("M-Y"); ?></h4>
                            </tr>
                            <thead>
                            <tr style="background:#888888; color:#FFF;">
                               <td></td>
                                <?php // start date of the month
                                $start_date =  date("d-M-Y",strtotime(date('01-'.('M').date('Y'))));
                                //  end date of the month
                                $end_date = date("d-M-Y", strtotime('-1 second',strtotime('+1 month',strtotime(date('01-'.('M').date('Y'))))));
                                //  number of days between tow days
                                $datediff = $end_date - $start_date;


                                $interval =$start_date; //date('d-M-Y', strtotime('-8 days'));
                                $current_date = date("d-M-Y");
                                for($i=1; $i<=$datediff+1; $i++){?>
                                <td>
                                <?php echo date("d",strtotime($interval)); ?>
                                </td>
                                <?php $interval = date("d-M-Y", strtotime("+1 day", strtotime($interval))); } ?>

                            </tr>
                            <!--<tr>
                                <th>S.No</th>
                                <th>Paid Amount</th>
                                <th>Paid To</th>
                                <th>Payment Reason</th>
                                <th>Date</th>

                            </tr>-->
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>

                            <?php } else {
                                foreach($result as $row){?>
                                <tr>
                                    <td><?=$row->expense_reason?></td>
                                   <?php
                                   $date=$start_date;

                                   for($d=1; $d<=$datediff+1; $d++){?>
                                        <td>
                                            <?php if($row->expense_created_date==$date){
                                                echo $row->expense_paid_amount;
                                            } ?>
                                        </td>

                                       <?php
                                       $date = date("d-M-Y", strtotime("+1 day", strtotime($date)));
                                      } ?>
                                </tr>

                            <?php } ?>
                                <tr style="background:#777777; color:#FFF; ">
                                <td>Total:</td>
                                    <?php
                                    $date=$start_date;

                                    for($d=1; $d<=$datediff+1; $d++){
                                        ?><td>

                                       <?php
                                        $total = 0;
                                        foreach($result as $row) {
                                            ?>

                                            <?php
                                            if($row->expense_created_date==$date) {
                                                 $total = $total+$row->expense_paid_amount;
                                            }
                                        } echo $total;  ?>


                                        <?php
                                        $date = date("d-M-Y", strtotime("+1 day", strtotime($date)));
                                     ?>
                                        </td>
                            <?php } }?>
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

