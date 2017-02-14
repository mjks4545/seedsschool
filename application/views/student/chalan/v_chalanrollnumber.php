<style>
    td, th {
        text-align: center;
    }
</style>
<?php
$session = $this->session->userdata('session_data');
$id= $session['id'];
$role = $session['role'];  ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <span class="text-capitalize"><?=$role; ?></span>
            Dashboard
            <small><a href="<?= site_url() ?>student/chalan_search/">
                    <span class="text-capitalize">Back To Search Chalan</span>
                    </a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Chalan By Roll Number
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
                     
                     
                    <!-- form start -->
                    <div class="box-body">
                        <?php if($role=="admin" || $role=="receptionist"){ ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Roll No</th>
                                <th>Student Name</th>
                                <th>Chalan Number</th>
                                <th>Month</th>
                                <th>Chalan Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                               <?php  foreach ($student_id  as $array): ?>
                                    <tr>
                                        <td><?= $array->student_id ?></td>
                                         <td><?= $array->student_name ?></td>
                                        <td><?= $array->chalan_number ?></td>
                                        <td><?= $array->fee_month ?></td>
                                        <td><?= $array->payment_date ?></td>
   
                                        <td>
                                         
                                             <a href="<?php echo site_url().'student/chalan_paid_home/'. $array->student_id;?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php } ?>
                                    </tbody>
                                
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

