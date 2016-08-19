<body class="hold-transition login-page">

 <div class="login-box">
<?php $error = $this->session->flashdata('error');

if(isset($error) ){
?>

<div class="alert alert-warning" id="erroralert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo $error;?>
</div>
<?php }?>

      <div class="login-logo">
        <a href=""><b>Seeds School Of Excellence</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo base_url('home/loginpro');?>" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
             <select class="form-control" name="role">
        <option>Login As</option>
        <option value="admin">Admin</option>
        <option value="teacher">Teacher</option>
        <option value="student">student</option>
        <option value="receptionist">receptionist</option>
        <option value="gatekeeper">Gate Keeper</option>
      </select>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        
        <a href="#">I forgot my password</a><br>
        <a href="<?=site_url()?>welcome/register" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
     <!-- jQuery 2.1.4 -->


<script type="text/javascript">

    $("#erroralert").fadeOut(8000);

</script>