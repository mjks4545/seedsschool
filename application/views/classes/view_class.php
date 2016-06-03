<style>
    td, th{
	text-align: center;
    }
</style>  
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Classes Details
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
		    <h3 class="box-title">Classes Records</h3>

                </div><!-- /.box-header -->
                <!-- form start -->
                 <div class="box-body">
                 <?php 
                 foreach ($classes->result() as $key) {
                  ?>

                  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="expnd" data-parent="#accordion" href="#collapse<?php echo $key->ClassNo; ?>" id="<?php echo $key->ClassNo; ?>"> Class : <?php echo $key->ClassNo; ?> </a>
      </h4>
    </div>
    <div id="collapse<?php echo $key->ClassNo; ?>" class="panel-collapse collapse">
      <div class="panel-body" style="min-height: 400px;
    overflow-y: scroll;">
          
          <table class="table">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Father Name</th>
        <th>Roll No</th>
        <th>Attendenct</th>
      </tr>
    </thead>
    <tbody>
    
    </tbody>
  </table>

          </div>
        </div>
      </div>

 <br>

 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Search Students Attendance</button>
<a class="btn btn-info" href="<?php echo base_url('attendanceController/showAllAtt/'.$key->ClassNo);?>">See Full Attendance</a>
<a class="btn btn-info" href="<?php echo base_url('attendanceController/seeDailyAtt/'.$key->ClassNo);?>">View today Attendance</a>
<!-- Modal -->
<br>



 <br>
                  <?php
                 }
                 ?>

                 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Search Students Attendance</h4>
      </div>
      <div class="modal-body">
      
      <select class="byclasses">
      <option value="">-- SELECT CLASS --</option>
      <?php
      foreach ($classes->result() as $key) {
        ?>
        <option value="<?php echo $key->ClassNo; ?>"><?php echo $key->ClassNo; ?></option>
        <?php
      }
      ?>
      </select>
      <select class="bystudents">
      
      </select>
      
      <input type="date"  class="byDate">
      <button class="btn-search">Search</button>
      <br>
      <table class="table attTable table-stripped">
        <thead>
          <th>
            Name
          </th>
          <th>
            Attendance
          </th>
          <th>
            Date
          </th>
          <tbody>
            
          </tbody>
        </thead>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>cDDDDDDDDDDDDDDD
              

<script type="text/javascript">
  $('.expnd').on('click',function(e){
      $('.table tbody').empty();
    $.ajax({
      type:"POST",
      url:"<?php echo base_url("classcontroller/get_students"); ?>",
      data:"Id="+$(this).attr('id'),
      success:function(data)
      {
        $('.table tbody').append(data);          
      }
    });
  })
</script>

<script type="text/javascript">
  $('.table').on('click' ,'.att',function(e){
    tr = $(this).closest('tr');
    std_id = tr.find('label.std_id').html();
     class_id = tr.find('label.class_id').html();
     //alert(class_id);exit;
    value = $("input[name=attr]:checked").val();
   // alert(std_id +"   "+value);exit;

   $.ajax({
    url:'<?php echo base_url("attendanceController/attendence");?>',
    type:"POST",
    data:{
        "RollNo":std_id,
        "atte":value,
        'ClassNo':class_id
      },
    success:function(data)
    {
    }
   });

  });

  

</script>
<script type="text/javascript">
  $('.byclasses').on('change',function(e){
    $('.bystudents option').remove();
    clas = $(this).val();
    $.ajax({
        url:'<?php echo base_url("attendanceController/get_students");?>',
    type:"POST",
    data:{
        "C":clas,
      },
        success:function(e)
        {
          $('.bystudents').append(e);
        }
    });

  });

  $('.btn-search').on('click',function(){
          $('.attTable tbody').empty();
     $.ajax({
        url:'<?php echo base_url("attendanceController/get_student_att");?>',
    type:"POST",
    data:{
        "C":$('.byclasses').val(),
        "S":$('.bystudents').val(),
        "D":$('.byDate').val(),
      },
        success:function(e)
        {
          $('.attTable tbody').append(e);
        }
    });

  });

</script>