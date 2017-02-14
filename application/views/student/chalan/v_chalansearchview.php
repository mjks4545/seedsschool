 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
           <?php $session = $this->session->userdata('session_data');
          $role = $session['role'];  ?>
        <section class="content-header">
          <h1>
              
              <?php if($role=="admin"){?>
              Admin Dashboard
            <small><a href="<?= site_url() ?>student/studentlevel/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Check Visitor
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
                         <h3 class="box-title">Search Chalan</h3>
                          
                     </div><!-- /.box-header -->
                      
                     
                         <div class="box-body">
                             <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                 <form role="form" data-toggle="validator" action="<?= site_url()?>student/get_chalan_by_class" method="post">
                                     <label for="exampleInputEmail1">Search By Class </label>
                                     <input type="text" name="chalan_class" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" placeholder="Enter class" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                      <div class="box-footer">
                             <button type="submit" class="btn btn-primary pull-left ">search class</button>
                         </div>
                                     </form>
                                 </div>

                                 <div class="form-group has-feedback col-md-6">
                                 <form role="form" data-toggle="validator" action="<?= site_url()?>student/get_chalan_by_no" method="post">
                                     <label for="exampleInputEmail1">Search By Chalan Nomber</label>
                                     <input type="text" name="chalan_number"    class="form-control" id="exampleInputEmail1" placeholder="Enter chalan Number" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                     <div class="box-footer">
                             <button type="submit" class="btn btn-primary pull-right ">search chalan</button>
                         </div>
                                     </form>

                                 </div>
                             </div><!--col md 12 endddddddddd -->

                              <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                 <form role="form" data-toggle="validator" action="<?= site_url()?>student/get_chalan_by_roll" method="post">
                                     <label for="exampleInputEmail1">Search By Roll No </label>
                                     <input type="text" name="student_id" class="form-control" maxlength="30" minlength="1" id="exampleInputEmail1" placeholder="Enter Roll Number" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                      <div class="box-footer">
                             <button type="submit" class="btn btn-primary pull-left ">search Roll N0</button>
                            </div>
                                     </form>
                                 </div>
 
                             </div>
                             
                         </div><!-- /.box-body -->
                         
                      
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>