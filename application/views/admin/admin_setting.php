          <?php $session = $this->session->userdata('session_data');
            $id= $session['id']; ?>
				
<div class="content-wrapper">
<section class="content">
<br>
<br>
	<h1>Admin Details</h1>
	<hr style="height:1px; background:#ccc">
                        <?php foreach($adm_data as $data){?>
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
				    <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
	                            <div class="col-md-2">
	                                <div class="form-group name"><label>Name :</label>
	                                 <?= $data->name?>
	                                </div>
	                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
	                            <div class="col-md-4">
	                                <div class="form-group name"><label>Email : </label>
	                                 <?= $data->email?>	
	                                </div>
	                            </div>
                            <div class="col-md-1">

                            </div>
                           </div>
          </div>
          <br>
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">

				    <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
	                            <div class="col-md-2">
	                                <div class="form-group name"><label>Password : </label>
	                                	 <?= $data->pwd?>
	                                </div>
	                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
	                            <div class="col-md-4">
	                                <div class="form-group name">
	                                	<a href="" data-toggle="modal" data-target="#myModal">change Password</a>
	                                </div>
	                            </div>
                            <div class="col-md-1">

                            </div>
                           </div>
          </div>

          <br>
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
				    <!-- general form elements -->
                            <div class="col-md-1">

                            </div>
	                            <div class="col-md-2">
	                                <div class="form-group name"><label>Address : </label>
	                                 <?= $data->address?>
	                                </div>
	                            </div>
                            <div class="col-md-2">
                                <!----for spacing---->
                            </div>
	                            <div class="col-md-4">
	                                <div class="form-group name"><label>Created_date : </label>
	                                <?= $data->created_at?>
	                                </div>
	                            </div>
                            <div class="col-md-1">

                            </div>
                           </div>
          </div>
          </div>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    
                                    <form role="form" method="post" action="<?php echo base_url('admin/change_admin_password')?>">
                                      <div class="form-group">
                                        <label for="oldPassword">Old Password:</label>
                                        <input type="text" class="form-control" name="oldPassword" value="<?= $data->pwd; ?>">
                                        <input type="hidden" class="form-control" name="pass_id" value="<?= $data->id; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="pwd">New Password:</label>
                                        <input type="text" class="form-control" name="password">
                                      </div>
                                     
                                      <button type="submit" class="btn btn-info">Change Password</button>
                                    </form>

                                </div>
                               
                              </div> 
                            </div>
                        </div>  


          <?php }?>
</section>
</div>            