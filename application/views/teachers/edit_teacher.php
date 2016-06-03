<style>
.plus {
	mrgin-top:60px;
	position:relative;
}
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Teacher
            <small>Form</small>
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
                  <h3 class="box-title">Update Teacher</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form"  action="<?= site_url()?>teachercontroller/update_teacher_after_post/<?= $result->t_id; ?>/<?= $result->u_id; ?>" method="post">
                  <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" class="form-control" value="<?= $result->name?>" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Father Name</label>
                              <input type="text" name="father_name" class="form-control" value="<?= $result->father_name?>" placeholder="Father name">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Subject</label>
                              <input type="text" name="subject" class="form-control" value="<?= $result->subject?>" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">CNIC</label>
                              <input type="text"name="cnic" class="form-control" value="<?= $result->cnic?>" placeholder="CNIC">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Country</label>
                              <select  name="country"  id="country" readonly class="form-control" >
                                 <option value="<?php echo $result->country_id ?>" selected="selected"><?= $result->country_name?></option>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Province</label>
                              <select name="province"  id="province" readonly class="form-control" >
                                  <option value="<?php echo $result->state_id ?>" selected="selected"><?= $result->state_name?></option>
                              </select>
                            </div>
                        </div> 
                        <div class="col-md-12">
                             <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">City</label>
                                <select  name="city"  id="city" readonly class="form-control" >
                                      <option value="<?php echo $result->id ?>"  selected="selected"><?= $result->city_name?></option>
                                   </select>
                             </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Village Or Street</label>
                              <input type="text" name="address" class="form-control" value="<?= $result->address?>" placeholder="Enter Village Or Street">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Contact</label>
                              <input type="text" name="contact" class="form-control" value="<?= $result->contact?>" placeholder="Contact">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Percentage</label>
                              <input type="text" name="percentage" class="form-control" value="<?= $result->percentage?>" placeholder="Percentage">
                            </div>
                        </div>
			               <div class="col-xs-offset-1 col-xs-10">
                      
                                      <div class="panel-group">
                <div class="panel-group">
    <div class="panel panel-success">
      <div class="panel-heading">Assign Class & Subject To Teacher</div>
      <div class="panel-body">
        <a  class="btn btn-warning addRow">Add Record</a>
          <br> 
          <hr>
          <table class="table teacherTab">
    <thead>
      <tr>
        <th>Class</th>
        <th>Subject</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
    <?php
    foreach ($subjects->result() as $key) {
      # code...
      ?>

       <tr>
            <td>
                <select class="form-control classes">
                  <option value="<?php echo $key->ClassNo ?>"><?php echo $key->ClassNo; ?></option>
                </select>
                </td>
            <td>
                <select class="form-control subject">
                  <option value="<?php echo $key->subject_id; ?>"><?php echo $key->subject_name; ?></option>
                </select>
             </td>
             <td>
                <a href="<?php echo $key->Id; ?>" class="btn btn-danger del">Remove</a>
                </td>
              </tr>

      <?php
    }

    ?>


    </tbody>
  </table>
        
    </div>
                </div>

                     </div>
                     </div>
                     </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary col-sm-1">Update</button>
                  </div>
                  </form>
                </div><!-- /.box -->
                </div>
              </div>
            </section>
            </div>
              
            <script type="text/javascript">
              $('.addRow').on('click',function(e){
                newRow = $('#addNewRow').html();
                $('.teacherTab tbody').append(newRow);                
                return false;
              });
            </script>
           

            <script type="text/template" id="addNewRow">
            <tr>
            <td>
                <select class="form-control classes">
                  <option value="Pre Nursery">Pre Nursery</option>
                  <option value="Nursery">Nursery</option>
                  <option value="Prep">Prep</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
                </td>
            <td>
                <select class="form-control subject">
                  <?php
                  foreach ($subject->result() as $key) {
                    ?>
                  <option value="<?php echo $key->subject_id; ?>"><?php echo $key->subject_name; ?></option>
                    <?php
                  }
                  ?>
                </select>
             </td>
             <td>
                <a href="" class="btn btn-success del">Save</a>
                </td>
              </tr>
            </script>

            <script type="text/javascript">
              
              $('.teacherTab tbody').on('click', '.del',function(e){
                id = "<?= $result->t_id; ?>";
                tr = $(this).closest('tr');
                is_new = tr.find("a").attr('href');
                if (is_new != "") {
                    $.ajax({
                    type:"POST",
                    url:"<?php echo base_url('teachercontroller/delete_teacher_class'); ?>",
                    data:"teacher="+is_new,
                    success:function(data)
                    {
                      tr.remove();
                    }
                  });
                }
                else
                {
                  $.ajax({
                    type:"POST",
                    url:"<?php echo base_url('teachercontroller/save_Teacher_clases'); ?>",
                    data:"classes="+tr.find("select.classes").val()+"&subject="+tr.find("select.subject").val()+"&teacher="+id,
                    success:function(data)
                    {
                      alert(data);
                    }
                  });
                }
                return false;
              });

            </script>

