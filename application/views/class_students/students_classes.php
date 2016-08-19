<style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small><a href="<?= site_url() ?>admin/">Admin</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Students Classes
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
                        <h3 class="box-title">View Students Classes</h3>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Subject Name</th>
                                <th>Teacuer Name</th>
                                <th>Level</th>
                                <th>Time</th>
                                

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sno=1; foreach ($std_classes as $value) { ?>
                                    <tr>
                                        <td><?= $sno?></td>
                                        <td><?= $value->su_name?></td>
                                        <td><?= $value->name?></td>
                                        <td><?= $value->co_name?></td>
                                        <td><?= $value->time?></td>
                                        <td>
                                            <a href="<?= site_url('class_controller/class_student_details/'.$value->cl_id)?>"
                                               type="button" class="btn btn-primary">
                                                <i class="fa fa-eye" alt="View details of this Visitor"
                                                   aria-hidden="true"></i>
                                                &nbsp;&nbsp;&nbsp;View Details
                                            </a>  
                                        </td>
                                    </tr>
                                <?php $sno++; }?>    
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

