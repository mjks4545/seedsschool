<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Class
			  <small><a href="<?= site_url()?>class_c/">Class</a>
				  <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
				  Add Class
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
                  <h3 class="box-title">Add New Class</h3>
					<a href="<?= site_url()?>class_c/" class="pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" data-toggle="validator" action="<?= site_url()?>class_c/insert" method="post">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Name</label>
			    <select type="text" name="name" class="form-control" maxlength="50" minlength="3" placeholder="Select Level" required >
				<option>Select Level</option>
				<?php foreach( $course as $value ) : ?>
				    <option value="<?=$value->co_id?>"><?=$value->co_name?></option>
				<?php endforeach; ?>
			    </select>
			    <!--<input type="text" name="name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name Like Class 1" required />-->
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Starting Date</label>
			    <input type="date" name="sdate" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Starting Date Of The Class" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
		    </div>
		    <div class="col-md-12">
			<input type="hidden" value="<?=  site_url();?>" id="url" />
			<input type="hidden" value="1" name="counter" id="counter" />
                        <div class="form-group has-feedback col-md-3">
			    <label for="exampleInputEmail1">Time</label>
			    <input type="text" name="time_1" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Time Like 10:00 - 11:00 AM" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
			    <label for="exampleInputEmail1">Fee</label>
			    <input type="text" name="fee_1" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Subject Fee Like 6000" required />
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-3">
			    <label for="exampleInputEmail1">Subject</label>
			    <select type="text" name="subject_1" id="1" class="form-control subonchange" maxlength="50" minlength="3" placeholder="Select Subject" required >
				<option>Select Subject</option>
				<?php foreach( $result as $value ) : ?>
				    <option value="<?=$value->su_id?>"><?=$value->su_name?></option>
				<?php endforeach; ?>
			    </select>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
                        <div class="form-group has-feedback col-md-2">
			    <label for="exampleInputEmail1">Teacher</label>
			    <select type="text" name="teacher_1" id="teacher_1" class="form-control teacher-get" maxlength="50" minlength="3" placeholder="Select Teacher" required >
				<option>Select Teacher</option>
			    </select>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-1">
			    <label for="exampleInputEmail1">&nbsp;</label>
			    <div id="add-another">
				<a href="#"><i style="color:#3c8dbc;font-size: 30px;" class="fa fa-plus"></i></a>
			    </div>
			</div>    
		    </div>
		     <div id="subject-add" class="col-md-12">
			
		    </div>
		 </div>  
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                </div>
             </form>
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              