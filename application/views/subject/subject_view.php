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
            <small><a href="<?=site_url()?>academic/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Subject
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
                        <h3 class="box-title">View Subject</h3>
                        <a href="<?= site_url() ?>subject/add" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Subject</a>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th colspan="9">Subject To be View</th>
                            </tr>
                            <tr>
                                <th>S.no</th>
                                <th>Subject Name</th>
                                <th>Duration</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ( empty( $result ) ) { ?>
                                <tr>
                                    <td colspan="9">No Visitor Found</td>
                                </tr>
                            <?php } else {
                                $sno=1;
                                foreach($result as $v){ ?>
                                <tr>
                                    <td><?= $sno; ?></td>
                                    <td><?= $v->su_name; ?></td>
                                    <td><?= $v->duration; ?></td>
                                    <td><a href="<?=  site_url(); ?>subject/edit/<?=$v->su_id?>" class="btn btn-info
">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;
                                            Edit
                                        </a>
                                    </td>
                                    <td><a href="<?=  site_url(); ?>subject/delete/<?=$v->su_id?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;
                                            Delete</a></td>
                                </tr>
                            <?php $sno++; } }?>
                            <tr>
                                <td colspan="5"><?=$this->pagination->create_links();?></td>
                            </tr>
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