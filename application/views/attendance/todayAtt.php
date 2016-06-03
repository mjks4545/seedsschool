<style type="text/css">
	th{
		text-align: center;
	}
	td{
		text-align: center;
	}
  .box {
    position: relative;
    border-radius: 3px;
    background: rgba(255, 255, 255, 0.71);
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
</style>
<br>
<br>

	  <!-- /.row -->
	  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Today Attendance</h3>
              <hr>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>RollNo</th>
                  <th>Date</th>
                  <th>Attendance</th>
                </tr>
                <?php foreach($attendance as $value) {?>
                <tr>
                  <td><?php echo $value['Std_Id'];?></td>
                  <td><?php echo $value['Att_Date'];?></td>
                  <td><?php echo $value['Attendance'];?></td>
                </tr>
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>	
      </div>	
