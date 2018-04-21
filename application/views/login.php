<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Labscheduler</b>LS</a>
    </div>
    
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <?= form_open('login', array('id'=>'login-form', 'method'=>'POST')); ?>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="username" name="User[id]" required="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="User[password]" required="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-4 col-sm-12">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </div>
        <?= form_close();?>
    </div>
    <a href="#">I forgot my password</a><br>
</div>