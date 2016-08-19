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

<style>
    td, th {
        text-align: center;
    }

    .name {
        margin-top: 60px;
    }
</style>

          <?php $session = $this->session->userdata('session_data');
           $role = $session['role'];?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       <?php if($role=="admin"){?>
            Admin Dashboard
            <?php }elseif($role=="receptionist"){?>
            Receptionist Dashboard
            <?php }?>
            <small><a href="<?= site_url() ?>visitor/">Visitor</a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                <a href="<?= site_url() ?>visitor/viewvisitors">
                    View Visitor
                </a>
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                Visitor Detail
            </small>
        </h1>
        <p class="pull-right">
            <b style="font-size:15px;" class="">Date:</b><?= $date ?>
            &nbsp;&nbsp;&nbsp;
        <b style="font-size:15px;" class="">Time:</b><?= $time ?>
        </p>
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
                        <a class="btn btn-info btn-sm pull-right" href="<?=site_url()?>visitor/visitorhistory/<?=$v->v_cnic?>">
                            Visitor History
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <b style="font-size:15px; ">Name:</b>

                                    <?= $name ?>
                                    <br/>
                                    <label class="">
                                        <b style="font-size:15px; ">Conatc Number:</b>
                                    </label>
                                    <?= $contact ?><br/>
                                    <label class="">
                                        <b style="font-size:15px; ">CNIC:</b>
                                    </label>
                                    <?= $v->v_cnic ?>
                                </div>
                                <div class="col-sm-4">
                                    <label class="">
                                        <b style="font-size:15px; ">RelationShip:</b>
                                    </label>
                                    <?= $relationship ?>
                                        <br/>
                                    <label class="">
                                        <b style="font-size:15px; ">Address:</b>
                                    </label>
                                    <?= $address ?>
                                    <br/>
                                    <b style="font-size:15px; ">Gender:</b>
                                    <?= $v->v_gender ?>
                                </div>
                                <div class="col-sm-4">
                                    <b style="font-size:15px; ">Reason:</b>
                                    <p><?= $reason ?></p>
                                    <!------------------------------------>

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
                                <hr/>
                                <div class="col-sm-8 col-xs-offset-2">
                                    <label for="exampleInputEmail1">Comment:</label>
                                    <p><?php if(!empty($v->comments)){
                                            echo $v->comments;
                                        }else{
                                            echo "No Comments Available";
                                        }?></p>
                                </div>
                            </div>
                            <div class="row">
                               <hr/>
                                <form role="form" data-toggle="validator" action="<?= site_url()?>visitor/addcommentpro/<?= $v->id?>" method="post">
                                        <div class="col-md-8 col-xs-offset-2">
                                            <div class="form-group has-feedback">
                                                <label for="exampleInputEmail1">Comment:</label>
                                                <textarea name="comment" style="height:80px; resize:none;  " class="form-control" maxlength="500" minlength="1" id="exampleInputEmail1" placeholder="Enter Comments for This Visitor" required></textarea>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true" style="margin-right: 20px;"></span>
                                                <span class="help-block with-errors" style="margin-left:10px; "></span>
                                            </div>
                                            <input class="btn btn-info pull-right" type="submit" name="submit" value="Comment">
                                        </div>
                                </form>
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
              
