 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
           <?php $session = $this->session->userdata('session_data');
          $role = $session['role'];  ?>
        <section class="content-header">
          <h1>
              
              <?php if($role=="admin"){?>
              Admin Dashboard
            <small><a href="<?= site_url() ?>visitor/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Check Visitor Record
            </small>
            <?php } elseif($role=="gatekeeper"){?>
            Gatekeeper Dashboard
                    <small>
                     <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                     <a href="<?php echo base_url('gatekeeper/index');?>">GateKeeper</a>
                     </small>
            <?php } elseif($role=="receptionist") {?>
            Receptionist Dashboard
                    <small>
                     <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                     <a href="<?php echo base_url('visitor');?>">Visitors</a>
                     </small>
                  <?php }?>   
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
                         <h3 class="box-title">Add New Visitor</h3>&nbsp;&nbsp;&nbsp;<span class="alert-danger"><?php echo $this->session->flashdata('message'); ?><span>
                         <a href="<?= site_url()?>visitor/" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
                     <form role="form" data-toggle="validator" action="<?= site_url()?>student/visitor_student" method="post">
                         <div class="box-body">
                             <div class="col-md-12">
                                  

                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Contact</label>
                                     <input type="text" name="contact"    class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
                              
                                 <!--for gender-->
                         </div><!-- /.box-body -->
                         <div class="box-footer">
                             <button type="submit" class="btn btn-primary pull-right col-sm-1">Search</button>
                         </div>
                     </form>
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>