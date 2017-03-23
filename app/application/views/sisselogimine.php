

<!--- viide: http://bootsnipp.com/snippets/featured/clean-modal-login-form -->


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	 <div class="modal-dialog">
				<div class="loginmodal-container" id="login-container"> 
					<div class="login-panel" id="login-panel" >
						<div class="panel-header">
							<button type="button" class="btn btn primary pull-left">Back </button>
							<h2 class="modal-title" >Logi sisse</h2><br>
						</div>
					  <form action=<?php echo base_url();?>index.php/login method="post" accept-charset="UTF-8" class="login-form" id="login-form">
						<input class="form control" type="text" name="user" placeholder="kasutajanimi">
						<input class="form control" type="password" name="pass" placeholder="parool">
						<input class="form control" type="checkbox" checked="checked"> Mäleta mind 
						<input class="form control" type="submit" name="login" class="login loginmodal-submit" value="Logi sisse">
						<input class="form control" type="button" id="contact-submit" name="register" class="register registermodal-button" value="Registreeru">
					  </form>
					
					  <div class="login-help">
						<a href="#">Unustasin parooli</a>
					  </div>
					</div> 
				</div>
		</div>	
	</div>
	

