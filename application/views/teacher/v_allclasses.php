 

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
            <small><a href="<?= site_url()?>admin/">Admin</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Class
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
                        <?php 
                $this->load->view('include/alert'); 
            ?>
                        <h3 class="box-title">View Class</h3>
                         

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th colspan="11">Class To be View</th>
                            </tr>
                            <tr>
                                <th>S.no</th>
                                <th>Level</th>
                                <th>Subject</th>
                                 
                                <th>Fee</th>
                                <th>Duration</th>
                                <th>Time</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                 <th>No Of Slots</th>
                                <th>View</th> 
                                <th>Add Syllabus</th> 
                                 
                            </tr>
                            </thead>
                            <tbody>
                <?php
                    $i = 1;
                    foreach ($result as $row) :
                ?>
                <tr>
                    <td><?=$i;?></td>
                    <td><?=$row->co_name;?></td>
                    <td><?=$row->su_name;?></td>
                     
                    <td><?=$row->fee;?></td>
                    <td><?=$row->duration;?></td>
                    <td><?=$row->time;?></td>
                    <td><?=$row->s_date;?></td>
                    <td><?=$row->e_date;?></td>
                    <td><?=$row->no_slots;?></td>
                    <td>
                        <a href="<?=site_url()?>teacher/syllabus/<?= $row->cl_id?>" class="btn btn-primary">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>View Detail</a>
                    </td>
                <td> <a href="<?=site_url()?>teacher/add_syllabus/<?= $row->cl_id?>" class="btn btn-primary ">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Add syllabus</a>
                 </td>

                    
                </tr>
                <?php
                    $i++;
                    endforeach;
                ?>
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