
<?php include 'includes/header.php' ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <a href="<?php echo url('/') ?>"><b>CPFd</b> Panel</a>
  </div>

  <hr>
  <div class="text-center">
  	<img src="<?php echo userProfile($user->id) ?>" width="150" class="img-circle" alt="Profile Image"><br>
  	<strong><?php echo $user->name ?></strong>
  </div>
  <hr>

    <p class="login-box-msg">Set New Password for you account !</p>

    <?php if(isset($message)): ?>
      <div class="alert alert-<?php echo $message_type ?>">
        <p><?php echo $message ?></p>
      </div>
    <?php endif; ?>


    <form action="<?php echo url('login/set_new_password') ?>" method="post">
    	<input type="hidden" value="<?php echo $user->reset_token ?>" />
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Enter New Password..." name="password" autofocus id="password" />
        <span class="fa fa-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" equalTo="#password" placeholder="Enter New Password Again..." name="password_confirm" />
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <?php // echo md5('admin') ?>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo url('login') ?>"> <i class="fa fa-chevron-left"></i> Go To Login</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include 'includes/footer.php' ?>
