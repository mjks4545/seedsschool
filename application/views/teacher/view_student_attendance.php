<!--<style>
    td, th {
        text-align: center;
    }
</style>-->
<?php $session = $this->session->userdata('session_data');
      $id= $session['id']; $role = $session['role'];?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <span class="text-capitalize"><?=$role; ?></span>
            Dashboard
              <small><a href="<?= site_url() ?>teacher/take_teacher_attendance">Take Teacher Attendance</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
               Attendence
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
                        <h3 class="box-title text-capitalize">Teacher Name: &nbsp;
                             
                            </h3>
                    </div>
                     
                        <div class="box-body">
                            <!-- for date-->
                            <div class="row">
                                <div class="form-group has-feedback col-sm-5 col-xs-6">
                                <form role="form" method="post" action="<?php echo site_url();?>teacher/search_student_attendance/<?= $this->uri->segment(3) ?>">
                                <input type="hidden" name="cl_id" value="<?= $this->uri->segment(3) ?>">
                                    <label for="exampleInputEmail1">Search By Date</label>
                                    <input type="date" name="date" class="form-control" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"
                                          style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span><br>
                                    <button type="submit" class="btn btn-success">Search</button>
                                    </form>
                                </div>
                            </div>
                            <!-- end date-->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>date</th>
                                    <th>Home work</th>
                                     <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result == null) { ?>
                                <?php } else {
                                    $sno = 1;
                                    foreach ($result as $array) { ?>
                                        
                                        <tr>
                                            <td><?= $sno ?></td>
                                            <td><?= $array->student_name ?></td>
                                            <td><?= $array->std_father_name ?></td>
                                             <td> <?= $array->att_date ?></td>
                                            <td> <?= $array->homework ?></td>
                                             <td> <?= $array->status ?></td>
                                          
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

