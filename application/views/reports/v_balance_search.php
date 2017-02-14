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
              <form method="post" action="<?= site_url()?>reports/balance_result/">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Select Level</label>
                    <select name="adv_name" id="name" class="form-control" style="width: 100%;">
                      <option value="">Select Level</option>
                      <?php 
                        foreach ($levels as $level ){ 
                          echo "<option value='$level->co_id'>$level->co_name</option>";
                        }
                      ?>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Select Subject</label>
                    <select name="adv_reg_no" id="reg_no" class="form-control" style="width: 100%;">
                      <option value="">Select Subject</option>
                      <?php 
                        foreach ($subjects as $subject ){ 
                          echo "<option value='$subject->su_id'>$subject->su_name</option>";
                        }
                      ?>
                    </select>
                  </div><!-- /.form-group -->
                </div>
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
                    <label>Select Fee</label>
                    <select name="fee_search" id="mobile" class="form-control" style="width: 100%;">
                      <option value="">Select fee</option>
                      <option value="admission_fee">admission fee</option>
                      <option value="monthly_fee">Monthly</option>
                      <option value="trf_discounts">TRF Discounts</option>
                      <option value="monthly_discounts">Monthly Discounts</option>
                      <option value="left">Fee Remaining to Left Students</option>
                    </select>
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