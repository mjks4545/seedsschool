<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Dashboard
            <small>
              <a href="<?php echo site_url()?>admin/">Admin</a>
              <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
              Reports Home
            </small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- SELECT2 EXAMPLE --><h3 class="alert-danger text-center"> <?php echo $this->session->flashdata('msg'); ?> </h3>
          <div class="box box-default">
            <div class="box-header with-border">
              <h2 style="text-align:center;">Advance Search</h2>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="<?= site_url()?>reports/payment_made_teacher/">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Select Teacher</label>
                    <select name="adv_mobile_no" id="mobile" class="form-control" style="width: 100%;">
                      <option value="">Select teacher</option>
                      <?php 
                        foreach ($teachers as $teacher ){ 
                          echo "<option value='$teacher->id'>$teacher->name</option>";
                        }
                      ?>
                    </select>
                  </div><!-- /.form-group -->
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                    <div class="form-group">
                        <label>From</label>
                        <input type="date" name="from" class="form-control" style="width: 100%;" >
                    </div><!-- /.form-group -->
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                    <div class="form-group">
                        <label>To</label>
                        <input type="date" name="to" class="form-control" style="width: 100%;" >
                    </div><!-- /.form-group -->
                 </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-info" style="width: 100%;">
                      
                  </div><!-- /.form-group -->
                </div>
        
              </div><!-- /.row -->
            </form>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->
       </section><!-- /.content -->
      </div><!-- /.content-wrapper -->