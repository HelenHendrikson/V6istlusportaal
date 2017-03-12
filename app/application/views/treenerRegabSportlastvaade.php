

<div class="container">
	<section id="content">
<<<<<<< HEAD
		<h2>Registreerimine</h2>
=======
>>>>>>> a0f65f6f920598783522c81ed771220452477f5f
		<div class="content-overlay">
			<div class="container-fluid">
				<div class="row" >
					<div class="col-xs-6 col-sm-4">
                        <div class="lisavoistlus">
                            <form action="<?php echo base_url(); ?>index.php/welcome/voistlused" method="get" accept-charset="UTF-8">
<<<<<<< HEAD
                                <B><?php echo $this->lang->line('tulevad_vĆµistlused') . ":"?></B> <BR>
                                <SELECT class="form-control" name="vĆµistlused" size="20" >
=======
                                <B><?php echo $this->lang->line('tulevad_võistlused') . ":"?></B> <BR>
                                <SELECT class="form-control" name="võistlused" size="20" >
>>>>>>> a0f65f6f920598783522c81ed771220452477f5f
                                    <?php if(isset($voistlused)){
                                        foreach ($voistlused as $voistlus){ ?>
                                            <OPTION value=<?php echo '"' . $voistlus->id . '"' ?>><?php echo $voistlus->nimi ?></OPTION>
                                        <?php  }
                                    } ?>
                                </SELECT>
<<<<<<< HEAD
                                <input type="submit" value=<?php echo $this->lang->line('vaata_vĆµistlust_nupp')?>></p>
=======
                                <input type="submit" value=<?php echo $this->lang->line('vaata_võistlust_nupp')?>></p>
>>>>>>> a0f65f6f920598783522c81ed771220452477f5f
                            </form>
                        </div>
                        <?php if(isset($voistluse_info)) {?>
                            <d1> <?php echo $voistluse_info[0] -> nimi; ?></d1>
                            <p> <?php echo $this->lang->line('distants') . ": " . $voistluse_info[0] -> distants; ?></p>
<<<<<<< HEAD
                            <p> <?php echo $this->lang->line('kuupĆ¤ev') . ": " . $voistluse_info[0] -> kuupĆ¤ev; ?></p>
=======
                            <p> <?php echo $this->lang->line('kuupäev') . ": " . $voistluse_info[0] -> kuupäev; ?></p>
>>>>>>> a0f65f6f920598783522c81ed771220452477f5f
                        <?php } ?>
                    </div>

					<div class="col-xs-6 col-sm-4">
                        <div class="registreerisportlane" >
<<<<<<< HEAD
                            <?php if(isset($vĆµistlejad)){ ?>
                                <p><?php echo $this->lang->line('registreerinute_teksti_esimene_pool') . " " .  $count[0]->arv  . " " . $this->lang->line('registreerinute_teksti_teine_pool') ?></p>
                                <B><?php echo $this->lang->line('registreeritud_sportlased') . ":" ?></B> <BR>
                                <SELECT class="form-control" name="Sportlased" size="20" MULTIPLE >
                                    <?php foreach ($vĆµistlejad as $vĆµistleja){ ?>
                                        <OPTION> <?php echo $vĆµistleja-> eesnimi . " " . $vĆµistleja-> perenimi ?></OPTION>
=======
                            <?php if(isset($võistlejad)){ ?>
                                <p><?php echo $this->lang->line('registreerinute_teksti_esimene_pool') . " " .  $count[0]->arv  . " " . $this->lang->line('registreerinute_teksti_teine_pool') ?></p>
                                <B><?php echo $this->lang->line('registreeritud_sportlased') . ":" ?></B> <BR>
                                <SELECT class="form-control" name="Sportlased" size="20" MULTIPLE >
                                    <?php foreach ($võistlejad as $võistleja){ ?>
                                        <OPTION> <?php echo $võistleja-> eesnimi . " " . $võistleja-> perenimi ?></OPTION>
>>>>>>> a0f65f6f920598783522c81ed771220452477f5f
                                    <?php  } ?>
                                </SELECT>
                            <?php  } ?>
                        </div>
                    </div>
				</div>
			</div>
	</section> 
</div>