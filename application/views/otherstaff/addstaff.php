<style>
    .course{
        margin-top: 10px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
        Admin Dashboard
        <small><a href="<?= site_url()?>otherstaff/">Staff</a>
            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            Add New Staff
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
                        <h3 class="box-title">Add New Staff</h3>
                        <a href="<?= site_url()?>otherstaff/" class="pull-right"> Back</a>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" data-toggle="validator" action="<?= site_url()?>otherstaff/addstaffpro" method="post">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter Name" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Contact number</label>
                                    <input type="text" name="contact" maxlength="15"  pattern="(?=.*\d).{7,}" minlength="11" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">CNIC</label>
                                    <input type="text" name="cnic" maxlength="15"  pattern="(?=.*\d).{13,13}" class="form-control" id="exampleInputEmail1" placeholder="Enter Cnic Number" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                                <div class="form-group has-feedback col-md-6">
                                    <label>Type</label>
                                    <select  name="type"  id="type" class="form-control">
                                        <option> Select type</option>
                                        <option value="receptionist">Receptionist</option>
                                        <option value="Librarian">Librarian</option>
                                        <option value="gatekeeper">Gate Keeper</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Salary</label>
                                    <input type="text" name="salary" class="form-control" maxlength="50" minlength="3" id="exampleInputEmail1" placeholder="Enter salary" required/>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>

                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address"   minlength="3" maxlength="100" class="form-control" id="exampleInputEmail1" placeholder="Enter Address" required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback col-md-6">
                                    <label for="exampleInputEmail1">Email(optional)</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                    <span class="help-block with-errors" style="margin-left:10px; "></span>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary col-sm-1">Save</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
