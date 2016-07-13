<style>
    td, th {
        text-align: center;
    }

    .name {
        margin-top: 10px;
    }

    .ad {
        text-align: center;
    }
</style>
           <?php $session = $this->session->userdata('session_data');
          $role = $session['role'];  ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Teacher Dashboard
            
            <small>
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
             <a href="<?= site_url() ?>teacher">Teacher</a>
            <?php if($role=="admin") {?>
                <a href="<?= site_url() ?>teacher/">Teacher</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>teacher/viewteacher">View Teacher</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>Details
            </small>
            <?php }?>
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

                        <h3 class="box-title">Teacher Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php foreach ($teachers as $teacher){ ?>
                        <div class="col-md-12 "><h3>Personal Information</h3>
                   <?php if($role=="admin") {?>         
                        <a
                                href="<?= site_url() ?>teacher/updateteacher/<?= $teacher->id ?>"
                                style="position:relative;bottom: 30px;" class="btn btn-info pull-right" type="button">Update
                        </a>
                        <?php }?>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Teacher Name : </label><?= $teachers['0']->name; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Contact Number
                                        : </label><?= $teachers['0']->contact; ?></div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Teacher CNIC : </label><?= $teachers['0']->cnic; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Address : </label><?= $teachers['0']->address; ?>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Date : </label><?= $teachers['0']->created_date; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Time : </label><?= $teachers['0']->created_time; ?>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-2">
                                <div class="form-group name"><label>Date : </label><?= $teachers['0']->created_date; ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group name"><label>Time : </label><?= $teachers['0']->created_time; ?>
                                </div>
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <!-- for class-->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12"><h3>Subject Information</h3>
                              <?php if($role=="admin") {?>    
                            <a
                                    href="<?= site_url() ?>teacher/add_class/<?= $teacher->id ?>"
                                    style="position:relative;bottom: 30px;" class="btn btn-info pull-right" type="button">Add Subject
                            </a>
                            <?php }?>
                                    </div>
                            <!------------table start----------------------------------->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover" style="margin-top:20px;">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Subject</th>
                                        <th>Percentage</th>
                                        <td>Total</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($subject==0){
                                    } else{
                                        $sno=1;
                                        foreach($subject as $sub){?>
                                            <tr>
                                                <td><?=$sno; ?></td>
                                                <td><?=$sub->su_name; ?></td>
                                                <td><?=$sub->comission."&nbsp;%"; ?></td>
                                                <?php $per = $sub->comission / 100;?>
                                                <?php  $salary = $per * $teacher_pesi = $this->teacher_m->sallrypersubject($sub->t_id,$sub->su_id);?>
                                                <td><?php if($salary == ''){ }else { echo $salary;} ?></td>
                                            </tr>
                                    <?php $sno++; }
                                    } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>





                                    <!-- end of class-->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
                           <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12"><h3>Class Information</h3></div>
                            <!------------table start----------------------------------->
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover" style="margin-top:20px;">
                                    <thead>
                                    <tr>
                                        <th>Course</th>
                                        <th>Subject</th>
                                        <th>Class time</th>
                                        <th>Starting date</th>
                                        <th>Ending date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($academic == 0){
                                    }else{
                                    foreach ($academic as $array){
                                     ?>
                                    <tr>
                                       <td><?= $array->co_name?></td>
                                       <td><?= $array->su_name?></td>
                                       <td><?= $array->time?></td>
                                       <td><?= $array->s_date?></td>
                                       <td><?= $array->e_date?></td>
                                       <td><?= $array->t_status?></td>
                                    </tr>
                                    <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <!-- /.box-body -->
                            <!------------table end------------------------------------->

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>
              


