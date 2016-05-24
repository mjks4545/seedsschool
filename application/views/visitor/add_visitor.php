 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Visitor
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
                  <h3 class="box-title">Add New Visitor</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="visitorcontroller/create_visitor_after_post" method="post">
                 <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Father Name</label>
                          <input type="text" name="father_name" class="form-control" id="exampleInputEmail1" placeholder="Enter  Father name">
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Purpose</label>
                          <input type="text" name="purpose" class="form-control" id="exampleInputEmail1" placeholder="Purpose">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Contact</label>
                          <input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number">
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Country</label>
                          <select    id="country" class="form-control" >
                                <option value="#">Select Country</option>
                                <?php foreach ($result as $country){ ?>
                                    <option value="<?= $country->id;?>"><?= $country->country_name;?></option>
                                <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Province</label>
                          <select   id="province" class="form-control" >
                              <option value="#">Select Province</option>
                          </select>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">City</label>
                             <select    id="city" class="form-control" >
                                <option value="#">Select City</option>
			     </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Villege Or Street</label>
                          <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Villege Or Street">
                        </div>
                    </div> 
                   
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary col-sm-1">Submit</button>
                </div>
             </form>
          </div><!-- /.box -->
       </div>
     </div>
   </section>
</div>
              