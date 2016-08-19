<?php
$session = $this->session->userdata('session_data');
$id = $session['id'];
$role = $session['role']; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <span class="text-capitalize"><?= $role; ?></span>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php $this->load->view('include/alert'); ?>
                        <h3 class="box-title"></h3>
                        <?php if($bankdetail!=0){
                            echo "<b class='text-capitalize'>".$bankdetail[0]->b_name."</b>";
                            echo "&nbsp;&nbsp;<b class='text-capitalize'>".$bankdetail[0]->b_account_no."</b>";
                            echo "&nbsp;&nbsp;<b class='text-capitalize'>".$bankdetail[0]->b_branch."</b>";
                        }?>
                        <div class="btn-group pull-right">
                            <a class="btn btn-success" href="<?=site_url()?>bank/index"><i
                                    class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</a>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Transaction Way</th>
                                    <th>Transaction Type</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php if($bankdetail!=0){
                                   $sno = 1;
                                   foreach ($bankdetail as $row){?>
                                <tr>
                                    <td><?=$sno;?></td>
                                    <td><?=$row->t_date;?></td>
                                    <td><?=$row->t_amount;?></td>
                                    <td class="text-capitalize"><?=$row->t_way;?></td>
                                    <td><?php
                                        if($row->t_type==1){
                                         echo "Deposit";
                                        }else{
                                            echo "With Draw";
                                        }?></td>
                                    <td><?=$row->t_detail;?></td>
                                </tr>
                               <?php $sno++; }
                               } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </div>
