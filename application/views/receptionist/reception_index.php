
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Receptionist Dashboard
            <small>Home</small>
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
                </div><!-- /.box-header -->
                <div class="row">
                    <div class="col-lg-1 col-xs-4"></div>
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Students Details</p>
                        </div>
                        <div class="icon">
                          <i class="fa ion-person-add"></i>
                        </div>
                        <a href="<?= site_url()?>studentcontroller/view_student" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                   <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Teachers Details</p>
                        </div>
                        <div class="icon">
                          <i class="fa ion-person-add"></i>
                        </div>
                          <a href="<?= site_url()?>teachercontroller/view_teacher" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>...</h3>
                          <p>Visitors Details</p>
                        </div>
                        <div class="icon">
                          <i class="fa ion-person-add"></i>
                        </div>
                          <a href="<?= site_url()?>visitorcontroller/view_visitor" class="small-box-footer">
                          Click here  <i class="fa fa-arrow-circle-right"></i>
                        </a>
                      </div>
                    </div><!-- ./col -->
                    
                 </div><!-- /.row -->
                </div><!-- /.box -->
              </div>
            </div>
        </section>
    </div>
              



