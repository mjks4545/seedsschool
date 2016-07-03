<style>
    td, th {
        text-align: center;
    }

    .name {
        margin-top: 60px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Director Dashboard
            <small><a href="<?= site_url() ?>visitor/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>visitor/viewvisitors">
                    View Visitor
                </a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Visitor Detail
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
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title">Visitor Details</h3>
                        <?php
                        foreach ($visitor as $v) {
                            $name = $v->name;
                            $contact = $v->contact;
                            $relationship = $v->relationship;
                            $address = $v->address;
                            $reason = $v->reason;
                            $note = $v->note;
                            $date = $v->date;
                            $time = $v->time;

                        }

                        ?>

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <b style="font-size:15px; ">Name:</b>

                                    <?= $name ?>
                                    <hr style="padding:5px; margin:5px;  "/>
                                    <label class="">
                                        <b style="font-size:15px; ">Conatc Number:</b>
                                    </label>
                                    <?= $contact ?>
                                </div>
                                <div class="col-sm-4">
                                    <label class="">
                                        <b style="font-size:15px; ">RelationShip:</b>
                                    </label>
                                    <?= $relationship ?>
                                    <hr style="padding:5px; margin:5px;  "/>
                                    <label class="">
                                        <b style="font-size:15px; ">Address:</b>
                                    </label>
                                    <?= $address ?>
                                </div>
                                <div class="col-sm-4">
                                    <b style="font-size:15px; ">Reason:</b>

                                    <p><?= $reason ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-xs-offset-1">
                                    <hr/>
                                    <b style="font-size:15px; ">Note:</b>

                                    <p class="text-justify"><?= $note ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-xs-offset-1">
                                    <hr/>
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        <b style="font-size:15px;" class="">Date:</b>

                                        <p><?= $date ?></p>
                                        <b style="font-size:15px;" class="">Time:</b>

                                        <p><?= $time ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>

    </section>
</div>
              
