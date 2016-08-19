 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Admin Dashboard
            <small>Teacher
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Add Teacher</small>
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
                         <h3 class="box-title">Add New Teacher</h3>
                         <a href="<?= site_url()?>teacher/" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>teacher/teacheraddpro" method="post">
                         <div class="box-body">
                             <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Name</label>
                                     <input type="text" name="name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">CNIC</label>
                                     <input type="text" name="cnic"  pattern="(?=.*\d).{13,15}"  class="form-control" id="exampleInputEmail1" placeholder="Enter CNIC Number" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Address</label>
                                     <input type="text" name="address"  class="form-control" minlength="3" maxlength="100" id="exampleInputEmail1" placeholder="Enter Address" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
								 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Contact</label>
                                     <input type="text" name="contact"  pattern="(?=.*\d).{10,15}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Email</label>
                                     <input type="email" name="email" class="form-control" minlength="3" maxlength="50" id="exampleInputEmail1" placeholder="Email" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Gender</label>
                                     <select name="t_gender" class="form-control"   required>
                                         <option value="">Select Gender</option>
                                         <option value="male">Male</option>
                                         <option value="female">Female</option>
                                     </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                             </div>

                         </div><!-- /.box-body -->
                         <div class="box-footer">
                             <button type="submit" class="btn btn-primary col-sm-1 pull-right">Save</button>
                         </div>
                     </form>
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>