 

 <style>
    td, th {
        text-align: center;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small><a href="<?= site_url()?>teacher/get_all_classes/">View Syllabus</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                View Class
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
                         <h3 class="box-title">Add Syllabus</h3>
                          
                     </div><!-- /.box-header -->
                      
                     
                         <div class="box-body">

                              <form role="form" data-toggle="validator" action="<?= site_url()?>teacher/insert_syllabus/<?php echo $this->uri->segment(3);?>" method="post">
                                 <div class="form-group has-feedback col-md-8 col-md-offset-2">
                                  
                                     <label for="exampleInputEmail1">Syllabus Title </label>
                                     <input type="text" name="syllabus_title" class="form-control" maxlength="50" minlength="1" id="exampleInputEmail1" placeholder="Enter syllabus title" required/>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                       
                                 </div>

                                  

                                 <div class="form-group has-feedback col-md-8 col-md-offset-2">
                                
                                     <label for="exampleInputEmail1">Syllabus Description</label>
                                     <textarea name="syllabus_description"    class="form-control" id="exampleInputEmail1" placeholder="Enter Syllabus Description" required ></textarea>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                     <div class="box-footer">
                                     <button type="submit" class="btn btn-primary ">Insert</button>
                                    </div>
                                     

                                 </div>
                              </form>
                         </div><!-- /.box-body -->
                         
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>
