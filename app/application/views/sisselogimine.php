<!--- viide: http://bootsnipp.com/snippets/featured/clean-modal-login-form -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="loginmodal-container" id="login-container">
            
            <div class="login-panel" id="login-panel">
                <div class="panel-header">
                    <h2 class="modal-title text-center">Logi sisse</h2>
                    <br>
                </div>
                <form action="<?php echo base_url();?>index.php/login" method="post" accept-charset="UTF-8" class="form" id="login-form">
                    <div class="form-group">
                        <label for="username">Kasutajanimi</label>
                        <input class="form-control" id="login-username" type="text" name="user" placeholder="kasutajanimi">
                    </div>

                    <div class="form-group">
                        <label for="password">Parool</label>
                        <input class="form-control" id="password" type="password" name="pass" placeholder="parool">
                    </div>

                    <div class="form-group">
                        <label for="remember">Hoia parool meeles</label>
                        <input  id="remember" type="checkbox" checked="checked">
                    </div>

                    <input class="pull-left btn btn-default" onclick="showRegister()" type="button"  name="register" value="Registreeru">
                    <input class="pull-right btn btn-primary" type="submit" name="login" value="Logi sisse">
                </form>

                <div class="row">
                    <div class="col-xs-12 text-center">
                        <div class="login-help">
                            <a href="#">Unustasin parooli</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="register-panel" id="register-panel">
                <div class="panel-header">
                    <h2 class="modal-title text-center">Registreerimine</h2>
                </div>
                <div class="row">
                    <div class="col-xs-12" id="heading"></div>
                </div>
                <form method="post" accept-charset="UTF-8" class="form" id="reg-form">
					<div class="form-group">
						<label for="username">Kasutajanimi</label>
						<input type="text" placeholder="Kasutajanimi" id="register-username" data-toggle="tooltip" data-original-title="Sisesta kasutajanimi" data-placement="right">
					</div>
					<div class="form-group">
						<label for="register-name">Nimi</label>
						<input type="text" id="register-name" placeholder="Nimi" data-toggle="tooltip" data-original-title="Sisesta eesnimi" data-placement="right">
					</div>
					<div class="form-group">
						<label for="register-last-name">Perekonnanimi</label>
						<input type="text" id="register-last-name" placeholder="Perekonnanimi" data-toggle="tooltip" data-original-title="Sisesta perekonnanimi" data-placement="right">
					</div>
						<div class="form-group">					
						<label for="register-mail">Meiliaadress</label>
						<input type="text" id="register-mail" placeholder="Meiliaadress" data-toggle="tooltip" data-original-title="Sisesta meiliaadress" data-placement="right">
                    </div>
					<div class="form-group">
						
						<label for="register-password">Parool</label>
						<input type="password" id="register-password" placeholder="Parool" data-toggle="tooltip" data-original-title="Sisesta vähemalt 6-täheline parool" data-placement="right">
                    </div>
					<div class="form-group">
					
						<label for="register-password-repeat">Parooli kinnitus</label>
						<input type="password" id="register-password-repeat" placeholder="Parooli kinnitus" data-toggle="tooltip" data-original-title="Sisesta parool uuesti" data-placement="right">
					</div>
					
                    <input type="button" class="pull-right btn btn-primary" onclick="validate()" value="Registreeru" id="register-button">

                    <input type="button" class="pull-left btn btn-default" onclick="showLogin()" value="Logi sisse">

                </form>
            </div>
        </div>
    </div>
</div>
