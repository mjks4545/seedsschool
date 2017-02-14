<style>
    td, th {
        text-align: center;
    }
    @media  print
   {
      .print_class {
        display: none;
      }
   }
</style>

<?php $session = $this->session->userdata('session_data');
$role = $session['role']; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if ($role == "admin") { ?>
                Admin Dashboard
            <?php } elseif ($role == "receptionist") { ?>
                Receptionist Dashboard
            <?php } ?>
            <small><a href="<?= site_url() ?>visitor/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View visitor
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
                        <h3 class="box-title">View Visitors</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>TRF Paid Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Seeds Share</th>
                                    <th>Total Paid</th>
                                    <th class="print_class">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    $total_trf         = 0;
                                    $total_amount      = 0;
                                    $total_paid_amount = 0;
                                    $total_seeds_share = 0;
                                    foreach( $montly_fee as $student_id => $student ) {
                                    $total_paid = 0;    
                                    ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $student['name']; ?></td>
                                    <td><?= $student['f_name']; ?></td>
                                    <td><?= ( isset( $trf[$student_id] ) ) ? $total_paid += $trf[$student_id]['trf'] : 0; ?></td>
                                    <?php 
                                        $total_trf  += $total_paid; 
                                        $seeds_share = $student['amount'] - $student['seeds_share']; 
                                    ?>
                                    <td><?= $student['amount'];$total_amount += $student['amount'];?></td>
                                    <td><?= $seeds_share;$total_seeds_share += $seeds_share;?></td>
                                    <td><?= $student['amount'] + $total_paid;$total_paid_amount += $student['amount'] + $total_paid; ?></td>
                                    <td class="print_class"><a class="btn btn-warning" href="<?= site_url();?>student/studentdetails/<?= $student_id;?>" >View</a></td>
                                </tr>
                                <?php $i++;} ?>
                            </tbody>    
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <th>Total</th>
                                    <td></td>
                                    <td><?= $total_trf;?></td>
                                    <td><?= $total_amount;?></td>
                                    <td><?= $total_seeds_share ?></td>
                                    <td><?= $total_paid_amount;?></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>