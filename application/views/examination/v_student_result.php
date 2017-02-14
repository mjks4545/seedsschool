<!--<style>
    td, th {
        text-align: center;
    }
</style>-->
<?php $session = $this->session->userdata('session_data');
      $id= $session['id']; $role = $session['role'];?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     
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

                            <?php if($result!= 0) {
                                echo $result[0]->name;
                            } ?></h3>
                    </div>
                    <!-- /.box-header -->
                    
                        
                        <div class="box-body">
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.no</th>

                                     <th>Subject</th>
                                      <th>Teacher Name</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Total Marks</th>
                                    <th>Obtained Marks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result == 0) { ?>
                                <?php } else {
                                    $sno = 1;
                                    foreach ($result as $array) { ?>
                                        <input type="text" class="hidden" name="student_id_<?=$sno?>" value="<?=$array->student_id?>"/>
                                        <tr>
                                            <td><?= $sno ?></td>
                                            <td><?= $array->su_name ?></td>
                                            <td><?= $array->name ?></td>
                                            <td><?= $array->student_name ?></td>
                                            <td><?= $array->std_father_name ?></td>
                                            <td><?= $array->total_mark ?></td>
                                             <td><?= $array->obtain_mark ?></td>
                                            
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

