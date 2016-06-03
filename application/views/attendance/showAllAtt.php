<style type="text/css">
	th{
		text-align: center;
	}
	td{
		text-align: center;
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
              <h3 class="box-title">Monthly Attendance</h3>
              <hr>

<!--               <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>RollNo</th>
                  <th>Date</th>
                  <th>Attendance</th>
                </tr>
                <?php foreach($Attendance as $value) {?>
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
