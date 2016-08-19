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
                        <h3 class="box-title">
                            Search Bank
                        </h3>
                        <div class="btn-group pull-right">
                            <a class="btn btn-success" href="<?= site_url() ?>bank/index"><i
                                    class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back</a>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" role="form" data-toggle="validator"
                              action="<?= site_url() ?>bank/search" method="post">
                            <div class="row">
                                <div class="col-sm-10 col-xs-offset-1">
                                    <div class="form-group has-feedback col-sm-6">
                                        <label for="exampleInputEmail1">Bank Name</label>
                                        <select name="b_name" id="bank" class="form-control text-capitalize" required>
                                            <option value="">Please Select bank</option>
                                            <?php
                                            foreach ($bank as $bnk) { ?>
                                                <option value="<?= $bnk->b_id ?>"><?= $bnk->b_name ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors"
                                              style="margin-left:10px; "></span>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="form-group has-feedback col-sm-5">
                                        <label for="exampleInputEmail1">Account Number</label>
                                        <select name="b_acc" id="b_acc" class="form-control text-capitalize" required>
                                            <option value="">Please Select Account</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors"
                                              style="margin-left:10px; "></span>
                                    </div>
                                </div>
                            </div><!--end of row-->
                            <div class="row">
                                <div class="col-sm-10 col-xs-offset-1">
                                    <div class="form-group has-feedback col-sm-6">
                                        <label for="exampleInputEmail1">Transaction Way</label>
                                        <select name="t_way" class="form-control" required>
                                            <option value="">Please Select Transaction</option>
                                            <option value="all">All</option>
                                            <option value="online">Online</option>
                                            <option value="cash">Cash</option>
                                            <option value="cheque">Cheque</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors"
                                              style="margin-left:10px; "></span>
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <div class="form-group has-feedback col-sm-5">
                                        <label for="exampleInputEmail1">Transaction Type</label>
                                        <select name="t_type" class="form-control" required>
                                            <option value="">Please Select Transaction Type</option>
                                            <option value="all">All</option>
                                            <option value="1">Deposit</option>
                                            <option value="0">With draw</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                              style="margin-right: 20px;"></span>
                                        <span class="help-block with-errors"
                                              style="margin-left:10px; "></span>
                                    </div>
                                </div>
                            </div><!--end of row-->
                            <div class="row">
                                <div class="col-sm-10 col-xs-offset-1">
                                    <form class="form-horizontal" role="form" data-toggle="validator"
                                          action="<?= site_url() ?>bank/searchpro" method="post">
                                        <div class="form-group has-feedback col-sm-6">
                                            <label for="exampleInputEmail1">Month</label>
                                            <select name="t_month" class="form-control" required>
                                                <option value="">Please Select Transaction Month</option>
                                                <option value="all">All</option>
                                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                                    <option value='<?= date("M", strtotime("01-" . $i . "-2001")); ?>'>
                                                        <?= date("M", strtotime("01-" . $i . "-2001")); ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                  style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors"
                                                  style="margin-left:10px; "></span>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="form-group has-feedback col-sm-5">
                                            <label for="exampleInputEmail1">Year</label>
                                            <select name="t_year" class="form-control" required>
                                                <option value="">Please Select Transaction Year</option>
                                                <option value="0">All</option>
                                                <?php
                                                $y = date("Y") - 10;
                                                for ($i = $y; $i <= date("Y"); $i++) { ?>
                                                    <option value='<?= $i ?>'>
                                                        <?= $i ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                  style="margin-right: 20px;"></span>
                                            <span class="help-block with-errors"
                                                  style="margin-left:10px; "></span>
                                            <hr/>
                                            <input type="submit" name="submit" value="Search"
                                                   class="btn btn-primary btn-block"/>

                                        </div>
                                </div>
                            </div><!--end of row-->
                        </form>
                        <!--////////////////////////////// for search result/////////////////////// -->
                        <div class="row">
                            <hr/>
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Branch</th>
                                            <th>Cheque Number</th>
                                            <th>Transaction Way</th>
                                            <th>Transaction Type</th>
                                            <th>Detail</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sno = 1;
                                        $d_total = 0;
                                        $w_total = 0;
                                        if ($search != 0) {
                                        foreach ($search as $sr) { ?>
                                            <tr>
                                                <td><?= $sno ?></td>
                                                <td><?php if ($sr->t_type == 1) {
                                                        $d_total = $d_total + $sr->t_amount;
                                                    } else {
                                                        $w_total = $w_total + $sr->t_amount;
                                                    }
                                                    echo $sr->t_amount; ?></td>
                                                <td><?= $sr->t_date ?></td>
                                                <td><?= $sr->b_name ?></td>
                                                <td><?= $sr->b_branch ?></td>
                                                <td><?= $sr->t_chknum ?></td>
                                                <td><?= $sr->t_way ?></td>
                                                <td><?php if ($sr->t_type == 1) {
                                                        echo "Deposit";
                                                    } else {
                                                        echo "With Draw";
                                                    } ?></td>
                                                <td>
                                                    <a style="color:#000; " data-toggle="tooltip" data-placement="left" title="<?=$sr->t_detail?>">
                                                        <?php echo substr($sr->t_detail,0,10); ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $sno++;
                                        } ?>
                                        </tbody>
                                        <tr style="background: #334433; color:#FFF; ">
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td>Deposit</td>
                                            <td>With Draw</td>
                                            <td>Balance</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                        <tr style="background: #334433; color:#FFF; ">
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $d_total + $w_total; ?></td>
                                            <td><?php echo $d_total; ?></td>
                                            <td><?php echo $w_total; ?></td>
                                            <td><?php echo $d_total - ($w_total); ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php }
                                        ?>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--////////////////////////////// end  search result/////////////////////// -->
                    </div><!--body box-->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $("#bank").change(function () {
        var b_name = this.value;
        $.ajax({
            url: '<?= site_url("bank/bank_account")?>',
            type: "POST",
            data: {b_name: b_name},
            success: function (data) {
                $('#b_acc').each(function () {
                    $(this).html(data);
                });
            }
        });
    });

</script>
