
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Calendar
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
          </ol>
        </section>
	<?php $this->load->view('include/alert') ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
		
		<!--
		    ---------------------------------------------------------
		-->	
		
		<div class="box box-primary">
		    <!-- form start -->
		    <form role="form" method="post" action="<?= site_url(); ?>events/insert">
		      <div class="box-body">
			<div class="form-group">
			  <label for="exampleInputEmail1">Date: </label>
			  <input type="date" class="form-control" id="exampleInputEmail1" name="e_date" placeholder="Enter email">
			</div>
			<div class="form-group">
			  <label for="exampleInputPassword1">Reason:</label>
			  <input type="text" class="form-control" id="exampleInputPassword1" name="e_title" placeholder="Reason">
			</div>
			<div class="form-group">
			  <label for="exampleInputPassword1">Type:</label>
			  <select class="form-control" id="exampleInputPassword1" name="e_type" placeholder="Type">
			      <option value="#">Select Type</option>
			      <option value="0">Off Day</option>
			      <option value="1">Event</option>
			  </select>
			</div>
			<div class="form-group">
			  <label for="exampleInputPassword1">Background Color:</label>
			  <input type="color" class="form-control" id="exampleInputPassword1" name="e_bg" placeholder="Background">
			</div>
		      </div><!-- /.box-body -->

		      <div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </form>
		  </div>
		    
		<!--
		    ---------------------------------------------------------
		-->
		
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      