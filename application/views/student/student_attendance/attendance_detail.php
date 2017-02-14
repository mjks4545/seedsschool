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
                Attandence details
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="<?= site_url(); ?>studentattendance/by_months/<?= $this->uri->segment(3); ?>/<?= $this->uri->segment(4); ?>/<?= $this->uri->segment(3); ?>" method="post" >
                <div class="col-md-12">
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Select Month</label>
                        <select class="form-control" name="month" required >
                            <option>Select Month</option>
                            <?php foreach( $months_years['month'] as $month ){
                                ?>
                                <option value="<?= $month; ?>" ><?= $month; ?></option>
                                <?php
                            }?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Select Year</label>
                        <select class="form-control" name="year" required >
                            <option>Select Year</option>
                            <?php foreach( $months_years['year'] as $year ){
                                ?>
                                <option value="<?= $year; ?>"><?= $year; ?></option>
                                <?php
                            }?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="exampleInputEmail1">&nbsp;</label><br>
                        <input class="btn btn-success" type="submit" value="Submit" name="submit">
                    </div>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Attandence Details</h3>
                        <a href="<?= site_url() ?>expenses/addexpenses" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Attandence</a>
                       
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                       <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <h4 class="text-center" style="padding:10px; ">Daily Attandence of <?php echo date("M-Y"); ?></h4>
                            </tr>
                            <thead>
                            <tr style="background:#888888; color:#FFF;">
                               
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
                                <tr>
                                <?php 
                                    $date = $start_date;
                                    for($d=1; $d<=$datediff+1; $d++){?>
                                        
                                            <?php if ($result == 0) { ?>

                                            <?php } else {
                                                echo '<td>';
                                                foreach($result as $row => $values){
                                                    
                                                    if( $values->att_date == $date){
                                                    ?>
                                                        <?php echo $values->status; ?>
                                                    <?php } ?>
                                            <?php }
                                                echo '</td>';
                                                    $date = date("d-M-Y", strtotime("+1 day", strtotime( $date )));
                                                } 

                                            ?>
                                <?php } ?>
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

