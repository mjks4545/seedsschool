 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Admin Dashboard
            <small>Teacher
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Update Teacher</small>
          </h1>
        </section>
     <!-- Main content -->
     <section class="content">
         <div class="row">
             <!-- left column -->
             <div class="col-md-12">
                 <!-- general form elements -->
                 <?php foreach ($teachers as $data) {?>
                 <div class="box box-primary">
                     <div class="box-header with-border">
                         <?php $this->load->view('include/alert'); ?>
                         <h3 class="box-title">Update Teacher</h3>
                         <a href="<?= site_url()?>teacher/viewteacherdetails/<?= $data->id?>" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>teacher/updateteacherpro/<?= $data->id?>" method="post">
                         <div class="box-body">
                             <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Name</label>
                                     <input type="text" name="name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" value="<?= $data->name?>" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">CNIC</label>
                                     <input type="text" name="cnic"  pattern="(?=.*\d).{13,15}"  class="form-control" id="exampleInputEmail1" value="<?= $data->cnic?>" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <!--<div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Subject</label>
                                     <select  name="subject"  id="type" class="form-control">
                                         <option value="#"> Select Subject</option>
                                         <?php /*foreach ($subject as $array) {

                                             if($array->su_id==$data->subject){*/?>
                                             
                                             <option value="<?/*= $array->su_id;*/?>" selected><?/*= $array->su_name;*/?></option>
                                         <?php /*} else{*/?>
                                         <option value="<?/*= $array->su_id;*/?>"><?/*= $array->su_name;*/?></option>

                                        <?php /* }
                                          }*/?>
                                     </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>-->
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Address</label>
                                     <input type="text" name="address"  class="form-control" minlength="3" maxlength="100" id="exampleInputEmail1" value="<?= $data->address?>" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Contact</label>
                                     <input type="text" name="contact"  pattern="(?=.*\d).{10,15}"  class="form-control" id="exampleInputEmail1" value="<?= $data->contact?>" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <!--<div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Percentage</label>
                                     <input type="text" name="percentage"  pattern="(?=.*\d).{2,10}"  class="form-control" id="exampleInputEmail1" value="<?/*= $data->percentage*/?>" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>-->
                             </div>
                             <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Email</label>
                                     <input type="email" name="email" class="form-control" minlength="3" maxlength="50" id="exampleInputEmail1" value="<?= $data->email?>" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Gender</label>
                                     <select name="t_gender" class="form-control"   required>
                                         <?php if($data->t_gender=="male"){ ?>
                                         <option value="">Select Gender</option>
                                         <option value="male" selected>Male</option>
                                         <option value="female">Female</option>
                                         <?php } else{?>
                                             <option value="">Select Gender</option>
                                             <option value="male">Male</option>
                                             <option value="female" selected>Female</option>
                                         <?php } ?>

                                     </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                             </div>

                         </div><!-- /.box-body -->
                         <?php }?>
                         <div class="box-footer">
                             <button type="submit" class="btn btn-primary col-sm-1 pull-right">Save</button>
                         </div>
                     </form>
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>

