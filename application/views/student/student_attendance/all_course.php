<style>
    td, th {
        text-align: center;
    }
</style>
<?php $session = $this->session->userdata('session_data');
      $id= $session['id']; $role = $session['role'];?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <span class="text-capitalize"><?=$role; ?></span>
            Dashboard
            <small><a href="<?= site_url() ?>student/">Student</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
               All Level
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
                        <h3 class="box-title">View Students</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Level Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result==0) {?>
                                <tr>
                                    <td colspan="7">
                                        <h3>No Result Found</h3>
                                    </td>
                                </tr>
                            <?php } else {
                                $sno = 1;
                                foreach ($result as $array) { ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $array->co_name ?></td>
                                        <td><a class="btn btn-success" href="<?=site_url()?>studentattendance/allclass/<?= $array->co_id ?>">
                                              <span class="fa fa-eye"></span>
                                                View Detail
                                            </a></td>
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

