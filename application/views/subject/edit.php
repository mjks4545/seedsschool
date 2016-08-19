<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Admin Dashboard
              <small><a href="<?=site_url()?>student/index"> Student</a>
                  <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                  <a href="<?=site_url()?>subject/index"> Subject</a>
                  <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                  Add New Subject
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
                    <?php $this->load->view('include/alert'); ?>
                  <h3 class="box-title">Update New Subject</h3>
                  <a href="<?= site_url()?>subject/" type="button" class="btn btn-primary glyphicon glyphicon pull-right"> Back</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" data-toggle="validator" action="<?= site_url()?>subject/update/<?=$data[0]->su_id;?>" method="post">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" name="name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name" value="<?=$data[0]->su_name;?>" required/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
			<div class="form-group has-feedback col-md-6">
			    <label for="exampleInputEmail1">Duration</label>
			    <input type="text" name="duration" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Duration like 4 months" value="<?=$data[0]->duration;?>" required/>
			    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
			    <span class="help-block with-errors" style="margin-left:10px; "></span>
			</div>
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
              