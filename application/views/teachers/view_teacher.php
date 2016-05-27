 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Teachers
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
                  <h3 class="box-title">Teachers Records</h3>
                  <a href="<?= site_url()?>teachercontroller/add_teacher" type="button" class="btn btn-primary glyphicon glyphicon-plus pull-right"> Add New Record</a>

                </div><!-- /.box-header -->
                <!-- form start -->
                
                 <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Reg No</th>
                        <th>Date</th>
                        <th>Teacher Name</th>
                        <th>Father Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Subject</th>
                        <th>Cnic</th>
                        <th>Percentage</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $array) {?>  
                      <tr>
                        <td><?= $array->t_id?></td>
                        <td><?= $array->created_at?></td>
                        <td><?= $array->name?></td>
                        <td><?= $array->father_name?></td>
                        <td><?= $array->contact?></td>
                        <td><?= $array->address?></td>
                        <td><?= $array->subject?></td>
                        <td><?= $array->cnic?></td>
                        <td><?= $array->percentage?></td>
                        <td>
                            <a href="<?= site_url()?>teachercontroller/edit_teacher/<?= $array->t_id?>/<?= $array->u_id?>" type="button" class="btn btn-primary glyphicon glyphicon-edit margin"> Edit</a>
                            <a href="<?= site_url()?>teachercontroller/delete_teacher/<?= $array->t_id?>/<?= $array->u_id?>" type="button" class="btn btn-primary glyphicon glyphicon-trash margin"> Delete</a>
                        </td>
                      </tr>
                      <?php }?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              
