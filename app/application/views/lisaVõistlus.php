
<div class="modal fade" id="addComp-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="loginmodal-container" id="login-container">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="login-panel" id="login-panel">
                <div class="panel-header">
                    <h2 class="modal-title text-center">Lisa võistlus</h2>
                    <br>
                </div>
                <div class="col-xs-12" id="comp_heading"></div>
                <form method="post" accept-charset="UTF-8" class="form" id="login-form">
                    <div class="form-group">
                        <label for="comp_name">Võistluse nimi</label>
                        <input class="form-control" id="comp_name" type="text" name="name" placeholder="nimi">
                    </div>
					<div class="form-group">
                        <label for="comp_date">Võistluse kuupäev vormis: aastaarv - kuu numbrina - päev numbrina (nt 2018-01-01)</label>
                        <input class="form-control" id="comp_date" type="text" name="date" placeholder="kuupäev">
                    </div>
					<div class="form-group">
                        <label for="comp_distance">Võistluse distants</label>
                        <input class="form-control" id="comp_distance" type="text" name="distance" placeholder="distants">
                        <input type="hidden" id="sports_id" value="<?php echo $this->session->userdata("sports_id")?>">
                    </div>
					<input class="btn btn-default btn-special btn2" type="button" onclick="add_competition()" name="add_comp" value="Lisa">
				</form>
			</div>
		</div>
	</div>
</div>
				