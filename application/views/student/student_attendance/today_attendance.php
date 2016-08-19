<style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $session = $this->session->userdata('session_data');
       $role = $session['role'];  ?>
    <section class="content-header">
        <h1>
            <span class="text-capitalize"><?=$role; ?></span>
            Dashboard
            <small><a href="<?= site_url() ?>studentattendance/allcourse">attendance</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Today Attendance
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
                        <h3 class="box-title">Today Attendance Of <?php
                            if($result!=0){
                                echo $result[0]->su_name.'&nbsp;Class&nbsp;&nbsp;with &nbsp;'.$result[0]->name;
                            }?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result==0) {?>
                            <?php } else {
                                $sno = 1;
                                foreach ($result as $array) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $array->student_name ?></td>
                                        <td><?= $array->std_father_name ?></td>
                                        <td><?= $array->status ?></td>
                                    </tr>
                                    <?php $sno++;
                                }
                            } ?>
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

