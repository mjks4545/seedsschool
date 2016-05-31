<body class="hold-transition login-page">
 <div class="login-box">
      <div class="login-logo">
        <a href=""><b>Seeds School Of Excellence</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo base_url('home/formData');?>" method="post">
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
        <?php foreach ($role as $value){?>
        <option value="<?php echo $value->id?>"><?php echo $value->role_title?></option>
       <?php }?>
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
