<style>
    td, th {
        text-align: center;
    }
    .btn span.glyphicon {               
    opacity: 0;             
}
.btn.active span.glyphicon {                
    opacity: 1;             
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small><a href="<?= site_url() ?>admin/">Admin</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Class Students
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
			<form method="post" action="<?= site_url('class_controller/step1_submit')?>"> 
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Student Name</th>
                                <th>Student Father Name</th>
                                <th>Status</th>
                                <th class="text-center">Promote <i><input type="checkbox" id="checkall" /></i>
                                </th>
                            </tr>
                            </thead>
                           
                            <tbody>
                                <?php $sno=1; foreach ($c_s_d as $value) {?>
                                    <tr>
                                        <td><?= $sno?></td>
                                        <td><?=$value->student_name?></td>
                                        <td><?= $value->std_father_name?></td>
                                        <td>
                                            <?php if($value->student_status=1){?>
                                            <i class="label label-info">Active</i>
                                            <?php }?>
                                        </td>
                                        <td>
					 <input id="check" name="s_id_<?=$sno; ?>" type="checkbox" value="<?=$value->fkstudent_id?>">  
                                        </td>
                                    </tr>
                                 <?php $sno++; } ?>
                                 <input type="hidden" name="num" value="<?=$sno?>">

                        <tr>
                            <td></td>
			    <td></td>
			    <td></td>
			    <td>Promote to Class</td>
                            <td>
				<?php $segments = explode('/', trim($_SERVER['REQUEST_URI'], '/')); ?>
                                <select class="form-control" name="pro_class">
				    <?php foreach ($classes as $key) {
					if( $segments[3] == $key->cl_id ) { continue; }
					?>   
                                    <option value="<?= $key->cl_id?>">
                                        <?php echo $key->co_name.' '.$key->su_name.' With '.$key->name?>
                                    </option>   
                                        <?php }?>  
                                </select>
                            </td>
                        </tr>
                     
                        </table>
			    
			    <input type="hidden" name="previous_class" value="<?= $segments[3]; ?>">
			    <input type="submit" value="Next" class="btn btn-md btn-info pull-right">                        
                </form>        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>
