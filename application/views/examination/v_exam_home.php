 

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
                        
                                <th>Make Result</th>
                                <th>View Result</th> 
                                
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
                    
                    <td>

                        <a href="<?=site_url()?>examination/make_result/<?= $row->cl_id?>/<?= $row->co_id?>/<?= $row->su_id?>" class="btn btn-primary">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Make Result</a>
                    </td>
                     <td>

                        <a href="<?=site_url()?>examination/view_result/<?= $row->cl_id?>/<?= $row->co_id?>/<?= $row->su_id?>" class="btn btn-primary">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>View Result</a>
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