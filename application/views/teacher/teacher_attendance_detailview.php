<style>
    .course {
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?= site_url() ?>teacher/">Teacher</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Attendance Detail
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
                        <h3 class="box-title">Attendance Detail </h3>
                        <a href="<?= site_url() ?>teacher/" class="pull-right"> Back</a>
                        <?php $this->load->view('include/alert'); ?>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-10 col-xs-offset-1">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <td>Date</td>
                                        <td>Status</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sno=1;
                                    foreach($result as $row){?>

                                        <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?=date("d-M-Y",strtotime($row->date))?></td>
                                            <td><?php
                                                if($row->status=='a'){ echo "Absent"; }
                                                elseif($row->status=='l'){ echo "Leave"; }
                                                elseif($row->status=='p'){ echo "Present"; }
                                                else{
                                                    echo $row->status;
                                                }?>
                                            </td>
                                        </tr>
                                        <?php $sno++; } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
