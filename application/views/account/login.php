<?php include 'includes/header.php' ?>
<div>
    <div class="login-box">
      <!-- /.login-logo -->

      <div class="login-box-body">
          <div class="login-logo">
              <p><a href="<?php echo url('/') ?>" style="color: #7aa6da" >
                      <img src="<?php echo url('/') ?>assets/img/logo1.png">
                  </a></p>
              <p class="login-box-msg" style="font-size: small">Sign in to start your session</p>
          </div>


            <?php if(isset($message)): ?>
              <div class="alert alert-<?php echo $message_type ?>">
                <p><?php echo $message ?></p>
              </div>
            <?php endif; ?>

            <?php if(!empty($this->session->flashdata('message'))): ?>
              <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
                <p><?php echo $this->session->flashdata('message') ?></p>
              </div>
            <?php endif; ?>


            <form action="<?php echo url('/login/check') ?>" method="post" autocomplete="off">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Enter Username or Email..." value="<?php echo post('username') ?>" name="username" />
                <span class="fa fa-user form-control-feedback"></span>
                <?php echo form_error('username', '<div class="error" style="color: red;">', '</div>'); ?>
              </div>

              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="fa fa-lock form-control-feedback"></span>
                <?php echo form_error('password', '<div class="error" style="color: red;">', '</div>'); ?>
              </div>
              <div class="form-group has-feedback">
               <!-- /.col -->
                <?php // echo md5('admin') ?>
                  <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
              </div>
                <!-- /.col -->
              </div>
            </form>
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </div>
    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include 'includes/footer.php' ?>
