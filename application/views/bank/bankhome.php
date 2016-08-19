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
                        <h3 class="box-title">View bank</h3>

                        <div class="btn-group pull-right">
                            <a class="btn btn-success" href="" data-toggle="modal" data-target="#myModal"><i
                                    class="fa fa-plus" aria-hidden="true"></i> Add Bank</a>
                            <a class="btn btn-success" href="<?=site_url()?>bank/search"><i
                                    class="fa fa-eye" aria-hidden="true"></i> &nbsp;View Detail</a>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add New Bank</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form role="form" data-toggle="validator"
                                                  action="<?= site_url() ?>bank/addbankpro" method="post">
                                                <div class="box-body">

                                                    <div class="form-group has-feedback ">
                                                        <label for="exampleInputEmail1">Bank Name</label>
                                                        <input type="text" name="bank_name" class="form-control"
                                                               maxlength="150" minlength="3" id="exampleInputEmail1"
                                                               placeholder="Bank Name" required/>
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                              style="margin-right: 20px;"></span>
                                                        <span class="help-block with-errors"
                                                              style="margin-left:10px; "></span>
                                                    </div>
                                                    <div class="form-group has-feedback ">
                                                        <label for="exampleInputEmail1">Account Number</label>
                                                        <input type="text" pattern="[0-9]{5,25}" name="acc_no"
                                                               class="form-control" id="exampleInputEmail1"
                                                               placeholder="Account Number" required/>
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                              style="margin-right: 20px;"></span>
                                                        <span class="help-block with-errors"
                                                              style="margin-left:10px; "></span>
                                                    </div>
                                                    <div class="form-group has-feedback ">
                                                        <label for="exampleInputEmail1">Branch</label>
                                                        <input type="text" name="branch" class="form-control"
                                                               maxlength="300" minlength="3" id="exampleInputEmail1"
                                                               placeholder="Branch" required/>
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                              style="margin-right: 20px;"></span>
                                                        <span class="help-block with-errors"
                                                              style="margin-left:10px; "></span>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <label for="exampleInputEmail1">Account Title</label>
                                                        <input type="text" name="acc_title" class="form-control"
                                                               maxlength="300" minlength="3" id="exampleInputEmail1"
                                                               placeholder="Branch" required/>
                                                        <span class="glyphicon form-control-feedback" aria-hidden="true"
                                                              style="margin-right: 20px;"></span>
                                                        <span class="help-block with-errors"
                                                              style="margin-left:10px; "></span>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary btn-block">Save
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-responsive">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Account Number</th>
                                <th>Branch</th>
                                <th>Account Title</th>
                                <th>Status</th>
                                <th colspan="3" class="text-center">Action</th>
                            </tr>
                            <?php
                            $sno = 1;
                            foreach ($bank as $bnk) {
                                echo "<tr>";
                                echo "<td>" . $sno . "</td>";
                                echo "<td>" . substr($bnk->b_name, 0, 10) . "</td>";
                                echo "<td>" . $bnk->b_account_no . "</td>";
                                echo "<td>" . substr($bnk->b_branch, 0, 20) . "</td>";
                                echo "<td>" . $bnk->b_account_title . "</td>";
                                echo "<td>";
                                if ($bnk->b_status == 1) { ?>
                                    <a href="<?= site_url() ?>bank/bankstatus/<?= $bnk->b_id ?>/0"
                                       class="btn btn-info btn-sm">Active</a>
                                <?php } else { ?>
                                    <a href='<?= site_url() ?>bank/bankstatus/<?= $bnk->b_id ?>/1'
                                       class='btn btn-danger btn-sm'>Dective</a>
                                <?php }
                                echo "</td>";
                                if ($bnk->b_status == 1) {
                                    echo "<td>" . "<a href='' class='btn btn-success btn-sm' data-toggle='modal' data-target='#deposit_$sno'><i class='fa fa-plus-circle'></i> Deposite</a>";
                                    ?>
                                    <!--///////////////////////////////// for deposite model/////////////////////// -->
                                    <div id="deposit_<?= $sno ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Deposite Money to <?= $bnk->b_name ?></h4>
                                                </div>
                                                <div class="modal-body">

                                                    <form role="form" data-toggle="validator"
                                                          action="<?= site_url() ?>bank/deposit/<?= $bnk->b_id ?>"
                                                          method="post">
                                                        <div class="box-body">

                                                            <div class="form-group has-feedback ">
                                                                <label for="exampleInputEmail1">Transaction Type<i
                                                                        style="color:#F00; font-size:19px; ">*</i></label>
                                                                <select name="t_type" class="form-control" required>
                                                                    <option value="">Please Select Transaction</option>
                                                                    <option value="online">Online</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="cheque">Cheque</option>
                                                                </select>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>
                                                            <div class="form-group has-feedback ">
                                                                <label for="exampleInputEmail1">Amount <i
                                                                        style="color:#F00; font-size:19px; ">*</i></label>
                                                                <input type="text" pattern="[0-9]{1,10}" name="amount"
                                                                       class="form-control" id="exampleInputEmail1"
                                                                       placeholder="Account Number" required/>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>
                                                            <div class="form-group has-feedback ">
                                                                <label for="exampleInputEmail1">Cheque No <i
                                                                        style="color:#F00;">(Optional)</i></label>
                                                                <input type="text" name="ch_no" class="form-control"
                                                                       pattern="[0-9]{0,20}"
                                                                       placeholder="Cheque Number"/>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>
                                                            <div class="form-group has-feedback">
                                                                <label for="exampleInputEmail1">Detail <i
                                                                        style="color:#F00; font-size:19px; ">*</i></label>
                                                                <textarea name="detail" class="form-control"
                                                                          maxlength="300" minlength="1"
                                                                          id="exampleInputEmail1"
                                                                          placeholder="Detail of transaction"
                                                                          style="resize:none; " required></textarea>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>
                                                        </div>
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-primary btn-block">Save
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--///////////////////////////////// end deposite model/////////////////////// -->
                                    <?php
                                    echo "</td>";
                                    echo "<td>" . "<a href='' data-toggle='modal' data-target='#withdraw_$sno' class='btn btn-warning btn-sm'><i class='fa fa-minus-circle'></i> Withdraw</a>";
                                    ?>
                                    <!-- //////////////////////////// for withdraw model/////////////////////// -->
                                    <div id="withdraw_<?= $sno ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">With Draw Money to <?= $bnk->b_name ?></h4>
                                                </div>
                                                <div class="modal-body">

                                                    <form role="form" data-toggle="validator"
                                                          action="<?= site_url() ?>bank/withdraw/<?= $bnk->b_id ?>"
                                                          method="post">
                                                        <div class="box-body">

                                                            <div class="form-group has-feedback ">
                                                                <label for="exampleInputEmail1">Transaction Type<i
                                                                        style="color:#F00; font-size:19px; ">*</i></label>
                                                                <select name="t_type" class="form-control" required>
                                                                    <option value="">Please Select Transaction</option>
                                                                    <option value="online">Online</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="cheque">Cheque</option>
                                                                </select>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>
                                                            <div class="form-group has-feedback ">
                                                                <label for="exampleInputEmail1">Amount <i
                                                                        style="color:#F00; font-size:19px; ">*</i></label>
                                                                <input type="text" pattern="[0-9]{1,10}" name="amount"
                                                                       class="form-control" id="exampleInputEmail1"
                                                                       placeholder="Account Number" required/>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>
                                                            <div class="form-group has-feedback ">
                                                                <label for="exampleInputEmail1">Cheque No <i
                                                                        style="color:#F00;">(Optional)</i></label>
                                                                <input type="text" name="ch_no" class="form-control"
                                                                       pattern="[0-9]{0,20}"
                                                                       placeholder="Cheque Number"/>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>
                                                            <div class="form-group has-feedback">
                                                                <label for="exampleInputEmail1">Detail <i
                                                                        style="color:#F00; font-size:19px; ">*</i></label>
                                                                <textarea name="detail" class="form-control"
                                                                          maxlength="300" minlength="1"
                                                                          id="exampleInputEmail1"
                                                                          placeholder="Detail of transaction"
                                                                          style="resize:none; " required></textarea>
                                                                <span class="glyphicon form-control-feedback"
                                                                      aria-hidden="true"
                                                                      style="margin-right: 20px;"></span>
                                                                <span class="help-block with-errors"
                                                                      style="margin-left:10px; "></span>
                                                            </div>

                                                            <div class="box-footer">
                                                                <button type="submit" class="btn btn-primary btn-block">
                                                                    Save
                                                                </button>
                                                            </div>
                                                    </form>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!--///////////////////////////////// end withdraw model/////////////////////// -->

                                    <?php
                                    "</td>";
                                }
                                echo "<td>" . "<a href='' data-toggle='modal' data-target='#detail_$sno' class='btn btn-info btn-sm'>View Detail</a>";
                                /* ////////////////////////// for detail//////////////////////////// */
                                ?>
                                <div id="detail_<?= $sno ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">
                                                    <?= $bnk->b_name; ?>
                                                    Branch
                                                    <?= $bnk->b_branch ?>
                                                    Account Number
                                                    <?= $bnk->b_account_no ?>
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                    <?php
                                                    echo "<tr style='background:#778888;color:#FFF; '>"; ?>
                                                    <th>Total</th>
                                                    <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if ($transaction != 0) {
                                                        $total_dep = 0;
                                                        $total_wit = 0;
                                                        foreach ($transaction as $row) {
                                                            if (($row->fkbank_id == $bnk->b_id) && $row->t_type == 1) {
                                                                $total_dep = $total_dep + $row->t_amount;
                                                            }
                                                            if (($row->fkbank_id == $bnk->b_id) && $row->t_type == 0) {
                                                                $total_wit = $total_wit + $row->t_amount;
                                                            }
                                                        }
                                                        echo "<tr>";
                                                        echo "<td>Total Deposit</td>";
                                                        echo "<td>" . $total_dep . "</td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td>Total withDraw</td>";
                                                        echo "<td>" . $total_wit . "</td>";
                                                        echo "</tr>";
                                                        echo "<tr style='background:#778888;color:#FFF; '>";
                                                        echo "<th>Total Balance</th>";
                                                        $total_balnce = $total_dep - $total_wit;
                                                        echo "<th>" . $total_balnce . ".PKR" . "</th>";
                                                        echo "</tr>";
                                                    } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?= site_url() ?>bank/bankdetail/<?= $bnk->b_id ?>"
                                                   class="btn btn-primary">View Detail</a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <?php
                                /* ////////////////////////// end of detail//////////////////////////// */
                                echo "</td>";
                                echo "</tr>";
                                $sno++;
                            } ?>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
    </section>
</div>