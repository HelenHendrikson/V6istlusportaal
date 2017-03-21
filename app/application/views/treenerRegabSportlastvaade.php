

<div class="container" id="content">
	<div class="row" >
		<div class="col-xs-6 col-sm-4" id="leftPart">
            <div class="lisavoistlus">
                <form>
                    <B id="tulevasedVoistlused"><?php echo $this->lang->line('tulevad_võistlused') . ":"?></b> <br>
                    <select class="form-control" name="võistlused" size="20" id="voistlusSelect">
                        <?php if(isset($voistlused)){
                            foreach ($voistlused as $voistlus){ ?>
                                <option value="<?php echo $voistlus->id?>"><?php echo $voistlus->nimi ?></option>
                            <?php  }
                        } ?>
                    </select>
                    <input id="vaata_voistlust" type="submit" value="<?php echo $this->lang->line('vaata_võistlust_nupp')?>">
                </form>
            </div>
            <br>
            <b id="nimev2li"> </b>
            <p id="distansiv2li"> </p>
            <p id="kuupaevav2li"> </p>
        </div>

		<div class="col-xs-6 col-sm-4" id="rightPart">
            <p id="osalejateArv"> </p>
        </div>
	</div>
</div>