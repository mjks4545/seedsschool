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
            <small><a href="<?= site_url()?>Academic/">Academic</a>
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
                        <a href="<?= site_url() ?>class_c/add" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Class</a>

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
                                <th>Teacher</th>
                                <th>Fee</th>
                                <th>Duration</th>
                                <th>Time</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Action</th>
                                <th class="text-center">Status</th>
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
				    <td><?=$row->name;?></td>
				    <td><?=$row->fee;?></td>
				    <td><?=$row->duration;?></td>
				    <td><?=$row->time;?></td>
				    <td><?=$row->s_date;?></td>
				    <td><?=$row->e_date;?></td>
				    <td>
                        <a href="<?=site_url()?>class_c/updateclass/<?= $row->cl_id?>" class="btn btn-primary">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                    </td>
                    <td>
				    <?php if( $row->class_status == '1' ){ ?>

                        <a href="<?=  site_url()?>class_c/update/<?=$row->cl_id;?>/0" class="btn btn-success" ><i class="fa fa-check-circle-o" aria-hidden="true"></i> Active</a>
				    <?php }else{ ?>

                        <a href="<?=  site_url()?>class_c/update/<?=$row->cl_id;?>/1" class="btn btn-danger" ><i class="fa fa-ban" aria-hidden="true"></i> DeActive <?php } ?></a></td>


					
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