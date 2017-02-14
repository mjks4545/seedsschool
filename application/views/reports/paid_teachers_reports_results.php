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

<?php
    $session = $this->session->userdata('session_data');
    $role = $session['role'];
?>

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
                                    <th>Teacher Name</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>Amount Paid</th>
                                    <th class="print_class">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $total = 0;
                                    foreach( $data as $teacher ){ 
                                ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $teacher->name; ?></td>
                                            <td><?= $teacher->contact; ?></td>
                                            <td><?= $teacher->address; ?></td>
                                            <td><?= $teacher->paid_salary;$total+=$teacher->paid_salary; ?></td>
                                            <td class="print_class"><a class="btn btn-warning" href="<?= site_url() ?>teacher/viewteacherdetails/<?= $teacher->id; ?>">View Details</a></td>
                                        </tr>
                                <?php
                                    $i++;}
                                ?>
                            </tbody>    
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <th><?= $total;?></th>
                                    <th></th>
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