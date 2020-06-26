<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include 'includes/header.php' ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <a href="<?php echo url('/') ?>"><b>CPFd</b> Panel</a>
  </div>
    <p class="login-box-msg">Reset your account password !</p>

    <?php if(isset($message)): ?>
      <div class="alert alert-<?php echo $message_type ?>">
        <p><?php echo $message ?></p>
      </div>
    <?php endif; ?>

    <?php if(!empty($this->session->flashdata('alert'))): ?>
      <div class="alert alert-<?php echo $this->session->flashdata('alert-type') ?>">
        <p><?php echo $this->session->flashdata('alert') ?></p>
      </div>
    <?php endif; ?>


    <form action="<?php echo url('/login/reset_password') ?>" method="post" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Username or Email..." value="<?php echo !empty(post('username'))? post('username') : get('username')  ?>" name="username" autofocus />
        <span class="fa fa-user form-control-feedback"></span>
        <p class="help-block">An Email will be sent to registered email</p>
        <?php echo form_error('username', '<div class="error" style="color: red;">', '</div>'); ?>
      </div>

      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Now</button>
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
