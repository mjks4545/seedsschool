<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Class
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
                  <a href="<?= site_url()?>classcontroller/view_classes" type="button" class="btn btn-primary glyphicon glyphicon pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= site_url()?>classcontroller/add_class_after_post" method="post">
                  <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Subject</label>
                              <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Physics">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Time</label>
                              <input type="date" name="time" class="form-control" id="exampleInputEmail1" placeholder="10:00 - 11:00">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Teacher</label>
                              <select type="date" name="teacher" class="form-control" id="exampleInputEmail1" placeholder="">
				  <option value="#" >Please Select A Teacher</option>
				  <?php 
					foreach ( $data as $teacher ){
					    ?>
						<option value="<?= $teacher->t_id ?>" ><?= $teacher->name ?></option>
					    <?php
					}
				  ?>
			      </select>
                            </div>
			    <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary form-control">Save</button>
			    </div>
                        </div> 
                  </div><!-- /.box-body -->
                  </form>
                </div><!-- /.box -->
                </div>
              </div>
            </section>
            </div>
              