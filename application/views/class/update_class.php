<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Class
            <small><a href="<?= site_url()?>student/">Class</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url()?>class_c/">View Classes</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Update Class
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
                        <h3 class="box-title">Update Class</h3>
                        <a href="<?= site_url()?>class_c/" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php foreach ($class as $data) {?>
                    <form role="form" data-toggle="validator" action="<?= site_url()?>class_c/updateclasspro/<?= $data->cl_id?>" method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Name</label>
                                    <select type="text" name="course_name" class="form-control" maxlength="50" minlength="3" required >
                                        <?php foreach( $course as $value ) {
                                            if ($value->co_id == $data->co_id) {?>
                                                <option value="<?=$value->co_id?>" selected><?=$value->co_name?></option>
                                            <?php } else{?>
                                                <option value="<?=$value->co_id?>"><?=$value->co_name?></option>
                                        <?php }} ?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Starting Date</label>
                                    <input type="date" name="sdate" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?php $date = $data->s_date; echo date('Y-m-d',strtotime($date))?>" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" value="<?=  site_url();?>" id="url" />
                                <input type="hidden" value="1" name="counter" id="counter" />
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Time</label>
                                    <input type="text" name="time_1" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $data->time?>" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Fee</label>
                                    <input type="text" name="fee_1" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $data->fee?>" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Subject</label>
                                    <select type="text" name="subject_1" class="form-control subonchange" maxlength="50" minlength="3" required >
                                        <?php foreach( $subject as $subj ) {
                                            ?>
                                            <option value="<?=$subj->su_id?>" <?= ( $subj->su_id == $data->su_id ) ? 'selected=selected' : '' ; ?>><?=$subj->su_name?></option>
                                        <?php  }?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Teacher</label>
                                    <select type="text" name="teacher_1" id="teacher_1" class="form-control teacher-get" maxlength="50" minlength="3" required >
                                        <option value="#">Select Teacher</option>
                                        <?php foreach( $teacher as $tech ) {
                                            ?>
                                            <option value="<?=$tech->id?>" <?= ( $tech->id == $data->t_id ) ? 'selected=selected' : '' ; ?>><?=$tech->name?></option>
                                        <?php  }?>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1">Update</button>
                        </div>
                    </form>
                    <?php }?>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

              