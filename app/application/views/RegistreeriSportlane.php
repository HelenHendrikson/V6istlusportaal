
<div class="modal fade" id="registerAthlete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="loginmodal-container" id="sportsmen_register-container">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="login-panel" id="sportsmen_register-panel">
                <div class="panel-header">
                    <h2 class="modal-title text-center"><?php echo $this->lang->line('registering_info')?></h2>
                    <br>
                </div>
                <div class="col-xs-12" id="sportsmen_register_heading"></div>
                <form id="registrationForm">
                     <input class="btn btn-default btn-special btn2" type="submit" name="add_athlete" value="<?php echo $this->lang->line('register_sportsmen_toggle')?>">
				 </form>
			</div>
		</div>
	</div>
</div>