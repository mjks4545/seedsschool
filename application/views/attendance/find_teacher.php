
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Search Teacher
            
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
                  <h3 class="box-title">Search Teacher</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= site_url()?>attendancecontroller/find_teacher_after_post" method="post">
                  <div class="box-body">
                        <div class="col-md-12">
			    <div class="row">
				<div class="form-group col-md-2">
				</div>
				<div class="form-group col-md-4">
				  <label for="exampleInputEmail1">Enter Teacher Registration Number</label>
                                  <input type="number" name="find_teacher" class="form-control" id="exampleInputEmail1" placeholder="Teacher Registration Number">
				</div>
                                <div class="form-group col-sm-1" style="top: 25px;">
                                    <button type="submit" class="btn btn-primary col-sm-12">Submit</button>
                                </div>
			    </div>
			</div> 
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <!--<button type="submit" class="btn btn-primary col-sm-1">Save</button>-->
                  </div>
                  </form>
                </div><!-- /.box -->
                </div>
              </div>
            </section>
            </div>
              


