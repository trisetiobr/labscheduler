<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Admin</b>LTE</a>
    </div>
    
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo validation_errors(); ?>
        <?php echo form_open('login'); ?>
        <?php
            if($loginStatus == 'failed'){
                echo 'wrong id/password';
            }
            else if($loginStatus == 'none'){
                echo 'username doesn\'t exists';
            }
            ?>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="username" name="id">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login">
                </div>
                 <!-- /.col -->
            </div>
    </form>
    <a href="#">I forgot my password</a><br>
  </div>
  <!-- /.login-box-body -->
</div>