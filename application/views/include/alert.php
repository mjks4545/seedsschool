<?php $msg =$this->session->flashdata('msg');
if ($msg != '') {
    $type = $this->session->flashdata('type');
    ?>
    <div class="row">
        <div class="alert alert-<?php echo $type; ?> col-sm-9 col-xs-9 col-xs-offset-1" role="alert" style="margin-top:10px; ">
            <b class="text-capitalize"><?php
                if ($type == 'warning') {
                    echo '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ' . $msg;
                }
                if ($type == 'danger') {
                    echo '<i class="fa fa-times-circle" aria-hidden="true"></i> ' . $msg;
                }
                if ($type == 'success') {
                    echo '<i class="fa fa-check-circle" aria-hidden="true"></i> ' . $msg;
                }
                if ($type == 'info') {
                    echo '<i class="fa fa-info-circle" aria-hidden="true"></i> ' . $msg;
                } ?></b>
        </div>
    </div>
<?php } ?>