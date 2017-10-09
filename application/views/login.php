<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
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
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="username" name="id" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="password" name="password" type="password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" name="submit" value="login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>