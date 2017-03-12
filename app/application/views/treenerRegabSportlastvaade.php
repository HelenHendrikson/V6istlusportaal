

<div class="container">
	<section id="content">
		<div class="content-overlay">
			<div class="container-fluid">
				<div class="row" >
					<div class="col-xs-6 col-sm-4">
                        <div class="lisavoistlus">
                            <form action="<?php echo base_url(); ?>index.php/welcome/voistlused" method="get" accept-charset="UTF-8">
                                <B>Tulevased võistlused:</B> <BR>
                                <SELECT class="form-control" name="võistlused" size="20" >
                                    <?php if(isset($voistlused)){
                                        foreach ($voistlused as $voistlus){ ?>
                                            <OPTION value=<?php echo '"' . $voistlus->id . '"' ?>><?php echo $voistlus->nimi ?></OPTION>
                                        <?php  }
                                    } ?>
                                </SELECT>
                                <input type="submit" value="Vaata võistlust"></p>
                            </form>
                        </div>
                        <?php if(isset($voistluse_info)) {?>
                            <d1> <?php echo $voistluse_info[0] -> nimi; ?></d1>
                            <p> <?php echo "distants; " . $voistluse_info[0] -> distants; ?></p>
                            <p> <?php echo "kuupäev: " . $voistluse_info[0] -> kuupäev; ?></p>
                        <?php } ?>
                    </div>

					<div class="col-xs-6 col-sm-4">
                        <div class="registreerisportlane" >
                            <?php if(isset($võistlejad)){ ?>
                                <p>Kokku on registreerinud ennast sellele võistlusele <?php echo $count[0]->arv ?> inimest</p>
                                <B>Registreeritud sportlased:</B> <BR>
                                <SELECT class="form-control" name="Sportlased" size="20" MULTIPLE >
                                    <?php foreach ($võistlejad as $võistleja){ ?>
                                        <OPTION> <?php echo $võistleja-> eesnimi . " " . $võistleja-> perenimi ?></OPTION>
                                    <?php  } ?>
                                </SELECT>
                            <?php  } ?>
                        </div>
                    </div>
				</div>
			</div>
	</section> 
</div>