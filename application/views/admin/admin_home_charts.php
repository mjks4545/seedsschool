<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard
            <small>All Data Graphical Representation</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Charts</a></li>
            <li class="active">ChartJS</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <li class="active bg-info"><a data-toggle="tab" href="#vpm">Visitor Per Month</a></li>
                    <li class="bg-info"><a id="tobeclicked1" data-toggle="tab" href="#vpy">Visitor Per Year</a></li>
                </ul>
                <div class="tab-content">
                    <div id="vpm" class="tab-pane fade in active">

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">visitor per month &#64; <?=date("Y")?></h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="visitorpm" style="height:250px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- end of vpm-->
                    <div id="vpy" class="tab-pane fade active">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">visitor per year</h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="visitorpy" style="height:250px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!--vpy-->
                </div>
            </div>
            <!--end of visitor-->
            <div class="col-md-6">
                <ul class="nav nav-tabs">
                    <li class="active bg-info"><a data-toggle="tab" href="#spm">Student Per Month</a></li>
                    <li class="bg-info"><a id="tobeclicked" data-toggle="tab" href="#spy">Student Per Year</a></li>
                </ul>
                <div class="tab-content">
                    <div id="spm" class="tab-pane fade in active">

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">student per month &#64; <?=date("Y")?></h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="studentpm" style="height:250px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!--  /.box -->


                    </div>
                    <!-- end of vpm-->
                    <div id="spy" class="tab-pane fade active">

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student per year</h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="studentpy" style="height:250px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--vpy-->
                </div>
            </div>
            <!--end of student-->
        </div>
        <!-- /.row -->
        <!----------------------- for fee------------>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active bg-info"><a data-toggle="tab" href="#sfm">Students Fee per Month</a></li>
                    <li class="bg-info"><a id="tobeclicked2" data-toggle="tab" href="#sfy">Students Fee per Year</a>
                    </li>
                    <li class="bg-info"><a data-toggle="tab" href="#sofm">Students Other fee per Month</a></li>
                    <li class="bg-info"><a data-toggle="tab" href="#sofy">Students Other fee per Year</a></li>
                </ul>
                <div class="tab-content">
                    <!-- LINE CHART -->
                    <div id="sfm" class="tab-pane fade in active">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">students Fee per Month &#64; <?=date("Y")?></h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="studentmfee" style="height:250px; "></canvas>
                                </div>
                                <hr style="margin:0px; padding:5px; "/>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-offset-2 text-center">
                                        <div class="label label-danger" style="font-size:14px;">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Unpaid Fee
                                        </div>
                                        <div class="label" style="font-size:14px;background:rgb(0,0,122);">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            paid Fee
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--student fee per year-->
                    <div id="sfy" class="tab-pane fade in active">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">students Fee per year</h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="yearlyfee" style="height:250px; "></canvas>
                                </div>
                                <hr style="margin:0px; padding:5px; "/>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-offset-2 text-center">
                                        <div class="label label-danger" style="font-size:14px;">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Unpaid Fee
                                        </div>
                                        <div class="label" style="font-size:14px;background:rgb(0,0,122);">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            paid Fee
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                    <!----------------------for student other payment----------------------------->
                    <!-- LINE CHART -->
                    <!----------------------for student other payment per year----------------------------->
                    <div id="sofm" class="tab-pane fade in active">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">students Other fee per Month &#64; <?=date("Y")?></h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="studentmotherfee" style="height:250px; "></canvas>
                                </div>
                                <hr style="margin:0px; padding:5px; "/>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-offset-2 text-center">
                                        <div class="label label-danger" style="font-size:14px;">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Unpaid Fee
                                        </div>
                                        &nbsp;
                                        <div class="label" style="font-size:14px;background:rgb(0,0,122);">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            paid Fee
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--student other payment per year-->
                    <!--student fee per year-->
                    <div id="sofy" class="tab-pane fade in active">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">students Other Fee per year</h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="yearlyotherfee" style="height:250px; "></canvas>
                                </div>
                                <hr style="margin:0px; padding:5px; "/>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-offset-2 text-center">
                                        <div class="label label-danger" style="font-size:14px;">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Unpaid Fee
                                        </div>
                                        <div class="label" style="font-size:14px;background:rgb(0,0,122);">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            paid Fee
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                    <!--/student other payment per year-->
                </div>
                <!------------------------ end of student other payment---------------------------------->
            </div>
        </div><!--/row-->
        <!------------------------- for monthly report------------------------------>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active bg-info"><a data-toggle="tab" href="#mfr">Monthly Financial Report</a></li>
                    <li class="bg-info"><a data-toggle="tab" id="yfrbtn" href="#yfr">Yearly Financial Reports</a></li>
                </ul>
                <div class="tab-content">
                    <!--income per month-->
                    <div id="mfr" class="tab-pane fade in active">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    Monthly Financial Reports &#64; <?=date("Y")?>
                                </h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="reportpm" style="height:250px; "></canvas>
                                </div>
                                <hr style="margin:0px; padding:5px; "/>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-offset-2 text-center">
                                        <div class="label label-danger" style="font-size:14px;">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Expenses
                                        </div>
                                        <div class="label" style="font-size:14px;background:rgb(0,0,122);">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Income
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                    <!----------------------financial report per year----------------------------->
                    <div id="yfr" class="tab-pane fade in active">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Yearly Financial Report</h3>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="reportpy" style="height:250px; "></canvas>
                                </div>
                                <hr style="margin:0px; padding:5px; "/>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-offset-2 text-center">
                                        <div class="label label-danger" style="font-size:14px;">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Expenses
                                        </div>
                                        &nbsp;
                                        <div class="label" style="font-size:14px;background:rgb(0,0,122);">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;
                                            Income
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!--/tab-->
                </div><!--/tab content-->
                <!------------------------ /end of Monthly report ---------------------------------->
            </div>
        </div><!-- end of row-->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->
