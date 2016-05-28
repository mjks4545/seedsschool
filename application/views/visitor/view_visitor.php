<style>
    td, th{
	text-align: center;
    }
</style>
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Visitors
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
                  <h3 class="box-title">Visitors Records</h3>
                  <a href="<?= site_url()?>visitorcontroller/add_visitor" type="button"  class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;&nbsp;Add&nbsp;&nbsp;Visitor</a>

                </div><!-- /.box-header -->
                <!-- form start -->
                
                 <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Reg No</th>
                        <th>Date</th>
                        <th>Visitor Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Purpose</th>
                        <th>Note</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $array) {?>  
                      <tr>
                        <td><?= $array->v_id?></td>
                        <td><?= $array->created_at?></td>
                        <td><?= $array->name?></td>
                        <td><?= $array->contact?></td>
                        <td><?= $array->address?></td>
                        <td><?= $array->purpose?></td>
                        <td><?= $array->note?></td>
                        <td>
                            <a href="<?= site_url()?>visitorcontroller/edit_visitor/<?= $array->v_id?>/<?= $array->u_id?>" type="button"  class="btn btn-warning"> <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;&nbsp;
                            <a href="<?= site_url()?>visitorcontroller/delete_visitor/<?= $array->v_id?>/<?= $array->u_id?>" type="button" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;&nbsp;Delete</a>
                        </td>
                      </tr>
                      <?php }?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div><!-- /.box -->
       </div>
     
   </section>
</div>
              
