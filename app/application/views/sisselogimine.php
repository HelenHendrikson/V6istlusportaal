<!--- viide: http://bootsnipp.com/snippets/featured/clean-modal-login-form -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="loginmodal-container" id="login-container">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="login-panel" id="login-panel">
                <div class="panel-header">
                    <h2 class="modal-title text-center"><?php echo $this->lang->line('logging_in_info')?></h2>
                    <br>
                </div>
                <div class="col-xs-12" id="login_heading"></div>
                <form method="post" accept-charset="UTF-8" class="form" id="login-form">
                    <div class="form-group">
                        <label for="login-username"><?php echo $this->lang->line('logging_in_Username')?></label>
                        <input class="form-control" id="login-username" type="text" name="user" placeholder="<?php echo $this->lang->line('logging_in_Username')?>">
                    </div>

                    <div class="form-group">
                        <label for="password"><?php echo $this->lang->line('logging_in_Password')?></label>
                        <input class="form-control" id="password" type="password" name="pass" placeholder="<?php echo $this->lang->line('logging_in_Password')?>">
                    </div>

                    <div class="form-group">
                        <label for="remember"><?php echo $this->lang->line('logging_in_keepPass')?></label>
                        <input  id="remember" type="checkbox" checked="checked">
                    </div>

                    <input class="pull-left btn btn-default" onclick="showRegister()" type="button"  name="register" value="<?php echo $this->lang->line('logging_in_register_btn')?>">
                    <input class="pull-right btn btn-primary" onclick="log_in()" type="button" name="login" value="<?php echo $this->lang->line('logging_in_info')?>">
                </form>

                <div class="row">
                    <div class="col-xs-12 text-center">
                        <div class="login-help">
                            <a href="#"><?php echo $this->lang->line('logging_in_forgot_pass')?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="register-panel" id="register-panel">
                <div class="panel-header">
                    <h2 class="modal-title text-center"><?php echo $this->lang->line('register_info')?></h2>
                </div>
                <div class="row">
                    <div class="col-xs-12" id="heading"></div>
                </div>
                <form method="post" accept-charset="UTF-8" class="form" id="reg-form">
					<div class="form-group">
						<label for="register-username"><?php echo $this->lang->line('logging_in_Username')?></label>
						<input type="text" placeholder="<?php echo $this->lang->line('logging_in_Username')?>" id="register-username" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('register_username_tooltip')?>" data-placement="right">
					</div>
					<div class="form-group">
						<label for="register-name"><?php echo $this->lang->line('register_name')?></label>
						<input type="text" id="register-name" placeholder="<?php echo $this->lang->line('register_name')?>" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('register_name_tooltip')?>" data-placement="right">
					</div>
					<div class="form-group">
						<label for="register-last-name"><?php echo $this->lang->line('register_2nd_name')?></label>
						<input type="text" id="register-last-name" placeholder="<?php echo $this->lang->line('register_2nd_name')?>" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('register_2nd_name_tooltip')?>" data-placement="right">
					</div>
						<div class="form-group">					
						<label for="register-mail"><?php echo $this->lang->line('register_mail')?></label>
						<input type="text" id="register-mail" placeholder="<?php echo $this->lang->line('register_mail')?>" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('register_email_tooltip')?>" data-placement="right">
                    </div>
					<div class="form-group">
						
						<label for="register-password"><?php echo $this->lang->line('logging_in_Password')?></label>
						<input type="password" id="register-password" placeholder="<?php echo $this->lang->line('logging_in_Password')?>" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('register_password_tooltip')?>" data-placement="right">
                    </div>
					<div class="form-group">
					
						<label for="register-password-repeat"><?php echo $this->lang->line('register_confirm_pass')?></label>
						<input type="password" id="register-password-repeat" placeholder="<?php echo $this->lang->line('register_confirm_pass')?>" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('register_password_confirm_tooltip')?>" data-placement="right">
					</div>
					
                    <input type="button" class="pull-right btn btn-primary" value="<?php echo $this->lang->line('logging_in_register_btn')?>" id="register-button" onclick="validate()">

                    <input type="button" class="pull-left btn btn-default" onclick="showLogin()" value="<?php echo $this->lang->line('logging_in_info')?>">

                </form>
            </div>
        </div>
    </div>
</div>
