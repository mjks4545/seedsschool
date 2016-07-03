
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small>Visitor</small>
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
                    </div><!-- /.box-header -->
                    <div class="row">
                        <div class="col-lg-1 col-xs-4"></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Add New Visitor</p>
                                </div>
                                <div class="icon">
                                    <i class="fa ion-person-add"></i>
                                </div>
                                <a href="<?= site_url()?>visitor/addvisitor" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>View Visitor</p>
                                </div>
                                <div class="icon">
                                    <i class="fa ion-person-add"></i>
                                </div>
                                <a href="<?= site_url()?>visitor/viewvisitors" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>...</h3>
                                    <p>Total Visitor Record</p>
                                </div>
                                <div class="icon">
                                    <i class="fa ion-person"></i>
                                </div>
                                <a href="<?= site_url()?>visitor/totalvisitorrecord" class="small-box-footer">
                                    Click here  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                </div>
            </div><!-- /.box -->
        </div>
</div>
</section>
</div>


