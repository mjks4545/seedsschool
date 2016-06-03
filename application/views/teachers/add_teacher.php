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
            Add Teacher
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
                  <h3 class="box-title">Add New Teacher</h3>
                  <a href="<?= site_url()?>teachercontroller/view_teacher" type="button" class="btn btn-primary glyphicon glyphicon pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= site_url()?>teachercontroller/create_teacher_after_post" method="post">
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
                              <label for="exampleInputEmail1">Subject</label>
                              <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">CNIC</label>
                              <input type="text"name="cnic" class="form-control" id="exampleInputEmail1" placeholder="CNIC">
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
                              <label for="exampleInputEmail1">Contact</label>
                              <input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Contact">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Percentage</label>
                              <input type="text" name="percentage" class="form-control" id="exampleInputEmail1" placeholder="Percentage">
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

            
              

