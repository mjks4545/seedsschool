<style>
    td, th {
        text-align: center;
    }
    @media print{
        .print-class{
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
            <small><a href="<?= site_url() ?>">Reports</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Balance or Discount Reports
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
                        <h3 class="box-title">Balance or Discount Reports</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Student Name</th>
                                <th>Contact number</th>
                                <th>Level</th>
                                <th>Subject</th>
                                <th>Teacher Name</th>
                                <?php if( $result['status'] == 'admission_fee' ){ ?>
                                    <th>Admission Fees</th>
                                <?php }elseif( $result['status'] == 'montly_fee' ){ ?>
                                    <th>Monthly Fees</th>
                                <?php }elseif( $result['status'] == 'trf_discounts' ){ ?>
                                    <th>TRF Discount</th>
                                    <th>Discount Reason</th>
                                <?php }elseif( $result['status'] == 'monthly_discounts' ){ ?>
                                    <th>Monthly Discount</th>
                                    <th>Discount Reason</th>
                                <?php } ?>
                                <th class="print-class">Actions</th>
                                <!-- <th class="text-center">Actions</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>
                            <?php } else {
                                $sno = 1;
                                $i = 0;
                                $total = 0;
                                foreach ($result as $v) {
                                    
                                    if( $i == 0 ){$i++;continue;}
//                                    echo '<pre>';
//                                    print_r($v);
//                                    die;
                                    ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $v->student_name ?></td>
                                        <td><?php echo $v->student_contact ?></td>
                                        <td><?php echo $v->co_name ?></td>
                                        <td><?php echo $v->su_name ?></td>
                                        <td><?php echo $v->name ?></td>
                                        <?php if( $result['status'] == 'admission_fee' ){ ?>
                                            <td><?php echo $v->admission_fee;$total += $v->admission_fee; ?></td>
                                        <?php }elseif( $result['status'] == 'montly_fee' ){ ?>
                                            <td><?php echo $v->remaning_fee;$total += $v->remaning_fee;?></td>
                                        <?php }elseif( $result['status'] == 'trf_discounts' ){ ?>
                                            <td><?php echo $v->discount;$total += $v->discount;?></td>
                                            <td><?php echo $v->reason;?></td>
                                        <?php }elseif( $result['status'] == 'monthly_discounts' ){ ?>
                                            <td><?php echo $v->montly_fee_discount;$total += $v->montly_fee_discount; ?></td>
                                            <td><?php echo $v->reason; ?></td>
                                        <?php } ?>
                                            <td class="print-class"><a class="btn btn-primary" href="<?= site_url(); ?>student/studentdetails/<?= $v->student_id?>" >View</td>
                                    </tr>
                                    <?php 
                                        $sno++;
                                }
                            } ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <th>Total</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th><?= $total;?></th>
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