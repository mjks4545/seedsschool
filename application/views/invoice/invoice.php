<div class="container-fluid">
<?php
 for($i=1; $i<=2; $i++){?>
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                        <img class="img-responsive" style="height:80px;" src="<?=site_url()?>/public/img/logo.jpg"/>
                    <h2 class="page-header">
                        Seeds School Of Excellence
                        <small class="pull-right"><b>Date:<?php echo date("d-M-Y"); ?></b></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>seeds school of excellence</strong><br>
                        University Town Peshawar<br>
                        KpK,Pakistan<br>
                        Phone:091-1234567<br>
                        Email: info@seedschool.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>R.No</strong><br>
                        <strong>Name</strong><br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b><?=rand(1000,10000000) ?><br>
                    <b>Payment Due:</b>2000/PKR<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>S.N0</th>
                            <th>Description</th>
                            <th>Paid Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>El snort testosterone trophy driving gloves handsome</td>
                            <td>2000./PKR</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <!-- for free space-->
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total Due:</th>
                                <td>3000./PKR</td>
                            </tr>
                            <tr>
                                <th>Paid Amount:</th>
                                <td>2000./PKR</td>
                            </tr>
                            <tr>
                                <th>Balance:</th>
                                <th>1000./PKR</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <br/><br/>
            <div class="row">
                <div class="col-sm-6 col-xs-6">
                    Paid by:_________________<br/><br/><br/><br/>
                    Signature:_________________<br/><br/>
                </div>
                <div class="col-sm-6 col-xs-6 text-right">
                    Recieved by:_________________<br/><br/><br/><br/>
                    Signature:_________________<br/><br/>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->
     <div class="col-sm-10 col-xs-offset-1 text-center">
        <b class="text-center">
           ----------- &#9986;--------- &#9986;-------- &#9986;----------
            &#9986;-------------- &#9986;---------------
        </b>
     </div>
 <?php }?>
</div>