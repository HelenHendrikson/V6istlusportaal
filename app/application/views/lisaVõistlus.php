
<div class="modal fade" id="addComp-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="loginmodal-container" id="comp-container">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="login-panel" id="comp-panel">
                <div class="panel-header">
                    <h2 class="modal-title text-center"><?php echo $this->lang->line('add_comp')?></h2>
                    <br>
                </div>
                <div class="col-xs-12" id="comp_heading"></div>
                <form method="post" accept-charset="UTF-8" class="form" id="comp-form">
                    <div class="form-group">
                        <label for="comp_name"><?php echo $this->lang->line('comp_name')?></label>
                        <input class="form-control" id="comp_name" type="text" name="name" placeholder="<?php echo $this->lang->line('name_placeholder')?>">
                    </div>
					<div class="form-group">
                        <label for="comp_date"><?php echo $this->lang->line('comp_date')?></label>
                        <input class="form-control" id="comp_date" type="text" name="date" placeholder="<?php echo $this->lang->line('date_placeholder')?>">
                    </div>
					<div class="form-group">
                        <label for="comp_distance"><?php echo $this->lang->line('comp_distance')?></label>
                        <input class="form-control" id="comp_distance" type="text" name="distance" placeholder="<?php echo $this->lang->line('distance_placeholder')?>">
                        <input type="hidden" id="sports_id" value="<?php echo $this->session->userdata("sports_id")?>">
                    </div>
					<input class="btn btn-default btn-special btn2" type="button" onclick="add_competition()" name="add_comp" value="<?php echo $this->lang->line('add_btn')?>">
				</form>
			</div>
		</div>
	</div>
</div>
				