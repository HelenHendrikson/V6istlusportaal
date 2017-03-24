

<!--- viide: http://bootsnipp.com/snippets/featured/clean-modal-login-form -->


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"  aria-hidden="true">
    	 <div class="modal-dialog">
				<div class="loginmodal-container" id="login-container"> 
					<div class="login-panel" id="login-panel" >
						<div class="panel-header">
							<h2 class="modal-title text-center" >Logi sisse</h2><br>
						</div>
					  <form action=<?php echo base_url();?>index.php/login method="post" accept-charset="UTF-8" class="login-form" id="login-form">
						<label for="username" >Kasutajanimi</label>
						<input class="form control" id="username" type="text" name="user" placeholder="kasutajanimi">
						<label for="password">Parool</label>
						<input class="form control" id="password" type="password" name="pass" placeholder="parool">
						<label for="remember">Hoia parool meeles</label>
						<input class="form control" id="remember" type="checkbox" checked="checked">  
						<input class="form-control" type="submit" name="login" value="Logi sisse">
						<input class="form control" type="button" id="contact-submit" name="register" value="Registreeru">
					  </form>
					
					  <div class="login-help">
						<a href="#">Unustasin parooli</a>
					  </div>
					</div> 
				</div>
		</div>	
	</div>
	

