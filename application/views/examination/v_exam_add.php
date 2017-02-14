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
              <small><a href="<?= site_url() ?>examination">Examination</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
               Result
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

                            <?php if($result!= 0) {
                                echo $result[0]->name;
                            } ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start --><?php if($result!=0){?>
                    <form role="form" data-toggle="validator"
                          action="<?= site_url() ?>examination/submit_result/<?= $result[0]->co_id;?>/<?= $result[0]->fkclass_id;?>"
                          method="post">
                        <?php } ?>
                        
                        <div class="box-body">
                            <div class="col-md-4 form-group">
                            <label>Total Marks</label>
                            <input type="text" name="total_mark" class="form-control " placeholder="Enter Total Marks once" required />
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    
                                    <th>Obtained Marks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result == 0) { ?>
                                <?php } else {
                                    $sno = 1;
                                    foreach ($result as $array) { ?>
                                        <input type="text" class="hidden" name="student[<?=$sno?>][student_id]" value="<?=$array->student_id?>"/>
                                        <tr>
                                            <td><?= $sno ?></td>
                                            <td><?= $array->student_name ?></td>
                                            <td><?= $array->std_father_name ?></td>
                                             
                                             <td><input type="text" class="form-control" name="student[<?=$sno;?>][obtain_mark]" </td> 
                                            
                                        </tr>
                                        <?php $sno++;
                                    }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if(!empty($result)) { ?>
                            
                        <div class="row">
                            <div class="col-sm-10 col-xs-offset-1">
                                
                                <input type="hidden" name="class_id" value="<?= $result[0]->cl_id; ?>"/>
                                 <input type="hidden" name="subject_id" value="<?= $result[0]->su_id; ?>"/>
                                 <input type="hidden" name="course_id" value="<?= $result[0]->co_id; ?>"/>
                                <input type="submit" class="btn btn-success btn-block pull-right"/>
                            </div>
                        </div>  
                        <br/>
                        </form>
                        <?php }else{ ?>
                           <?php  $this->session->set_flashdata('student_message', 'This class have no student'); 
                           redirect('examintion'); }?>
                    
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>

