<style>
.plus {
	mrgin-top:60px;
	position:relative;
}
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Student
            <small>Form</small>
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
                  <h3 class="box-title">Add New Student</h3>
                  <a href="<?= site_url()?>studentcontroller/view_student" type="button" class="btn btn-primary glyphicon glyphicon pull-right"> Back</a>

                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= site_url()?>studentcontroller/create_student_after_post" method="post">
                  <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Father Name</label>
                              <input type="text" name="father_name" class="form-control" id="exampleInputEmail1" placeholder="Father name">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Date Of Birth</label>
                              <input type="date" name="dob" class="form-control" id="exampleInputEmail1" placeholder="Date Of Birth">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Contact</label>
                              <input type="text"name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact">
                            </div>
                        </div> 
                        <div class="col-md-12">
                             <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Country</label>
                               <select  name="country"  id="country" class="form-control" >
                                     <option value="#">Select Country</option>
                                     <?php foreach ($result as $country){ ?>
                                         <option value="<?= $country->id;?>"><?= $country->country_name;?></option>
                                     <?php } ?>
                               </select>
                             </div>
                             <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Province</label>
                               <select name="province"  id="province" class="form-control" >
                                   <option value="#">Select Province</option>
                               </select>
                             </div>
                         </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">City</label>
                              <select  name="city"  id="city" class="form-control" >
                                    <option value="#">Select City</option>
                               </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Village Or Street</label>
                              <input type="text" name="address" class="form-control" placeholder="Enter Village Or Street">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Facebook Id</label>
                              <input type="text" name="fb_id" class="form-control" id="exampleInputEmail1" placeholder="Facebook Id">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Current Institute</label>
                              <input type="text" name="institute" class="form-control" id="exampleInputEmail1" placeholder="Institute Name">
                            </div>
                        </div> 
			<div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox col-md-6">
                                 <label>Gender: </label>
                                  <label><input type="radio"  name="gender" id="optionsRadios1" value="Male">Male</label>
                                  <label><input type="radio"   name="gender" id="optionsRadios2" value="Female">Female</label>
                                </div>

                                <div class="radio">
                                <!------for space------>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="checkbox form-group col-md-6">
                              <label>Courses: </label>
                                    <label><input type="radio"  name="course" id="optionsRadios1" value="O Level">O Level</label>
                                    <label><input type="radio"  name="course" id="optionsRadios2" value="AS Level">AS Level</label>
                                    <label><input type="radio"  name="course" id="optionsRadios3" value="A Level">A Level</label>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="form-group col-md-3">
                             <label for="exampleInputEmail1">Subject</label>
                             <input type="text" name="subject_name" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">Teacher Name</label>
                              <input type="text" name="subject_teacher" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="exampleInputEmail1">Starting Date</label>
                              <input type="date" name="starting_date" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                          <div class="col-md-1" style="margin-top:30px;">
                            <a href="#">
                              <span class="glyphicon glyphicon-plus"></span>
                            </a>
                          </div>
                       </div> 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                  </div>
                  </form>
                </div><!-- /.box -->
                </div>
              </div>
            </section>
            </div>
              