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
            Update Teacher
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
                  <h3 class="box-title">Update Teacher</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= site_url()?>teachercontroller/update_teacher_after_post/<?= $result->t_id; ?>/<?= $result->u_id; ?>" method="post">
                  <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" class="form-control" value="<?= $result->name?>" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Father Name</label>
                              <input type="text" name="father_name" class="form-control" value="<?= $result->father_name?>" placeholder="Father name">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Subject</label>
                              <input type="text" name="subject" class="form-control" value="<?= $result->subject?>" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">CNIC</label>
                              <input type="text"name="cnic" class="form-control" value="<?= $result->cnic?>" placeholder="CNIC">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Country</label>
                              <select  name="country"  id="country" readonly class="form-control" >
                                 <option value="<?php echo $result->country_id ?>" selected="selected"><?= $result->country_name?></option>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Province</label>
                              <select name="province"  id="province" readonly class="form-control" >
                                  <option value="<?php echo $result->state_id ?>" selected="selected"><?= $result->state_name?></option>
                              </select>
                            </div>
                        </div> 
                        <div class="col-md-12">
                             <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">City</label>
                                <select  name="city"  id="city" readonly class="form-control" >
                                      <option value="<?php echo $result->id ?>"  selected="selected"><?= $result->city_name?></option>
                                   </select>
                             </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Village Or Street</label>
                              <input type="text" name="address" class="form-control" value="<?= $result->address?>" placeholder="Enter Village Or Street">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Contact</label>
                              <input type="text" name="contact" class="form-control" value="<?= $result->contact?>" placeholder="Contact">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Percentage</label>
                              <input type="text" name="percentage" class="form-control" value="<?= $result->percentage?>" placeholder="Percentage">
                            </div>
                        </div>
			
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary col-sm-1">Update</button>
                  </div>
                  </form>
                </div><!-- /.box -->
                </div>
              </div>
            </section>
            </div>
              



