<style>
    td, th {
        text-align: center;
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
                        <h3 class="box-title">View Student Per Class</h3>
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
                                <th>Parent / Gardian Number</th>
                                <th>Level</th>
                                <th>Subject</th>
                                <th>Teacher Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($result == 0) { ?>
                            <?php } else {
                                $sno = 1;
                                foreach ($result as $v) {
                                    ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $v->student_name ?></td>
                                        <td><?php echo $v->student_contact ?></td>
                                        <td><?php echo $v->std_guardian_contact ?></td>
                                        <td><?php echo $v->co_name ?></td>
                                        <td><?php echo $v->su_name ?></td>
                                        <td><?php echo $v->name ?></td>
                                    </tr>
                                    <?php $sno++;
                                }
                            } ?>

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