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
            <small><a href="<?= site_url()?>teacher/">Teacher</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Teachers
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
                        <h3 class="box-title">View Teachers</h3>
                        <a href="<?= site_url() ?>teacher/addteacher" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Teacher</a>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Teacher Name</th>
                                <th>Contact Number</th>
                                <th>Teacher CNIC</th>
                                <th>Address</th>
                                <th>Status</th>
                                
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($teachers == 0) { ?>
                            <?php } else {
                                $sno=1;
                                foreach($teachers as $t){?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $t->name; ?></td>
                                    <td><?php echo $t->contact; ?></td>
                                    <td><?php echo $t->cnic ?></td>
                                    <td><?php echo $t->address; ?></td>
                                    
                                    <td><?php if($t->t_status  == 1 ) {?>
                                        <a href="<?=site_url()?>teacher/status/0/<?=$t->id ?>" class="btn btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            &nbsp;Active</a>
                                        <?php }else{?>
                                            <a href="<?=site_url()?>teacher/status/1/<?=$t->id ?>" class="btn btn-danger">
                                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                &nbsp;Deactive</a>
                                    <?php }?></td>
                                    
                                    <td>
                                        <a href="<?=site_url()?>teacher/viewteacherdetails/<?=$t->id?>" type="button" class="btn btn-primary">
                                            <i class="fa fa-eye"  alt="View details of this Visitor" aria-hidden="true"></i>
                                            &nbsp;&nbsp;&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                                        <a href="<?=site_url()?>teacher/paymentdetails/<?=$t->id?>" type="button" class="btn btn-primary">
                                            <i class="fa fa-money"  alt="View details of this Visitor" aria-hidden="true"></i>
                                            &nbsp;&nbsp;&nbsp;Payment Details</a>&nbsp;&nbsp;&nbsp;
                                            <a href="<?= site_url() ?>teacher/deleteteacher/<?=$t->id?>" onclick="return confirm('Do You Want To Delete This?')" type="button" class="btn btn-danger">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                            &nbsp;&nbsp;&nbsp;Delete</a>
                                    </td>
                                </tr>
                            <?php $sno++; } }?>
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

