
<div class="container" id="content">
	<div class="row" >
		<div class="col-xs-6 col-sm-4" id="leftPart">
            <div class="lisavoistlus">
                <form id="competitionForm">
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
            <?php if(isset($voistluse_info)) {?>
                <p id="nimev2li"> <?php echo $voistluse_info[0]["nimi"] ?></p>
                <p id="distansiv2li"> <?php echo $this->lang->line('distants') . ": " . $voistluse_info[0]["distants"]; ?></p>
                <p id="kuupaevav2li>"> <?php echo $this->lang->line('kuupäev') . ": " . $voistluse_info[0]["kuupäev"]; ?></p>
            <?php } else { ?>
                <p id="nimev2li"></p>
                <p id="distansiv2li"></p>
                <p id="kuupaevav2li"></p>
            <?php } ?>
        </div>

		<div class="col-xs-6 col-sm-4" id="rightPart">
            <?php if(isset($võistlejad)){ ?>
                <p id="osalejateArv"><?php echo $this->lang->line('registreerinute_teksti_esimene_pool') . " " .  $count[0]["arv"]  . " " . $this->lang->line('registreerinute_teksti_teine_pool') ?></p>

                <SELECT class="form-control" name="Sportlased" size="20" MULTIPLE >
                    <?php foreach ($võistlejad as $võistleja){ ?>
                        <OPTION> <?php echo $võistleja["eesnimi"] . " " . $võistleja["perenimi"] ?></OPTION>
                    <?php  } ?>
                </SELECT>
            <?php } else { ?>
                <p id="osalejateArv"></p>
            <?php } ?>
        </div>
	</div>
</div>