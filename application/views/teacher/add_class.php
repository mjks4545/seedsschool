 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Admin Dashboard
            <small>Teacher
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Add Teacher</small>
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
                         <h3 class="box-title"></h3>
                         <a href="<?= site_url()?>teacher/" class="pull-right"> Back</a>
                     </div><!-- /.box-header -->
                     <!-- form start -->
					 <!----------form-->
					 <form role="form" data-toggle="validator" action="<?=site_url()?>teacher/teacheraddclasspro/<?=$id?>" method="post">
                         <div class="box-body">
                           <div class="col-md-12">
                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Name</label>
                                     <select name="subject" class="form-control"  required/>
									 <option value="">Add Subject</option>
									 <?php foreach($subjects as $sub){ ?>
									 <option value="<?=$sub->su_id?>"><?=$sub->su_name?></option>
									 <?php } ?>
									 </select>
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>

                                 <div class="form-group has-feedback col-md-6">
                                     <label for="exampleInputEmail1">Comission</label>
                                     <input type="text" name="comission"   class="form-control"  placeholder="Comission in % (20)" required />
                                     <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                     <span class="help-block with-errors" style="margin-left:10px; "></span>
                                 </div>
                             </div>
                            
                         </div><!-- /.box-body -->
                         <div class="box-footer">
                             <input  type="submit" name="submit" class="btn btn-primary col-sm-1 pull-right" value="save">
                         </div>
                     </form>
					 <!----------form end ----------------->
                 </div><!-- /.box -->
             </div>
         </div>
     </section>
 </div>