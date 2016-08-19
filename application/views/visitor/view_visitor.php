<style>
    td, th {
        text-align: center;
    }
</style>

          <?php $session = $this->session->userdata('session_data');
           $role = $session['role'];?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php if($role=="admin"){?>
            Admin Dashboard
            <?php }elseif($role=="receptionist"){?>
            Receptionist Dashboard
            <?php }?>
            <small><a href="<?=site_url()?>visitor/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                View visitor
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
                        <h3 class="box-title">View Visitors</h3>
                        <a href="<?= site_url() ?>visitor/addvisitor" type="button"
                           class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Visitor</a>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Visitor Name</th>
                                <th>Contact Number</th>
                                <th>Reason</th>
                                <th>Relationship</th>
                                <th>Date</th>
                                <th>time</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($visitors == 0) { ?>
                            <?php } else {
                                $sno=1;
                                foreach($visitors as $v){?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $v->name; ?></td>
                                    <td><?php echo $v->contact; ?></td>
                                    <td><?php echo substr($v->reason,0,15).'...' ?></td>
                                    <td><?php echo $v->relationship; ?></td>
                                    <td><?php echo $v->date; ?></td>
                                    <td><?php echo $v->time; ?></td>
                                    <td><?php if($v->v_status==1){?>
                                            <label class="label label-primary">Read</label>
                                        <?php } ?>
                                        <?php if($v->v_status==0){?>
                                            <label class="label label-success">Un read</label>
                                        <?php } ?></td>
                                    <td>
                                        <a href="<?=site_url()?>visitor/viewvisitordetail/<?=$v->id?>" type="button" class="btn btn-primary">
                                            <i class="fa fa-eye"  alt="View details of this Visitor" aria-hidden="true"></i>
                                            &nbsp;&nbsp;&nbsp;View</a>&nbsp;&nbsp;&nbsp;
                                        <a href="<?= site_url() ?>visitor/deletevisitor/<?=$v->id?>" onclick="return confirm('Do You Want To Delete This?')" type="button" class="btn btn-danger">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                            &nbsp;&nbsp;Delete</a>
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