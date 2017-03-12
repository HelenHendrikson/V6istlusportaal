

<div class="container">
	<section id="content">
<<<<<<< HEAD
		<div class="content-overlay">
			<div class="container-fluid">
				<div class="row" >
					<div class="col-xs-6 col-sm-4"> 
							<B>Vali võistlus:</B> <BR>
							<SELECT class="form-control" name="Võistlused" size="20" MULTIPLE >
							<OPTION SELECTED> Tartu Mai Jooks 05.05.2017
							<OPTION> SEB Sügisjooks
							<OPTION> U21 MM
							<OPTION> Võistlus1
							<OPTION> Võistlus2
							<OPTION> Võistlus4
							<OPTION> Võistlus3
							</SELECT>
					<div class="lisavoistlus">
						<form action="<?php echo base_url(); ?>index.php/welcome/", method="input", accept-charset="UTF-8"><p><input type="text", name="voistlus"><input type="submit" value="Lisa võistlus"></p>
						</form>
					</div> 
					</div>
					<div class="col-xs-6 col-sm-4"> 
							<B>Registreeritud sportlased:</B> <BR>
							<SELECT class="form-control" name="Sportlased" size="20" MULTIPLE >
							<OPTION SELECTED> Mari Rebane
							<OPTION> i1
							<OPTION> i2
							<OPTION> i3
							<OPTION> i4
							<OPTION> i5
							<OPTION> i6
							</SELECT>
						<div class="registreerisportlane" >
							<form action="<?php echo base_url(); ?>index.php/welcome/", method="input", accept-charset="UTF-8"><p><input type="text", name="voistlus"><input type="submit" value="Registreeri sportlane"></p>
							</form>
						</div> 
					</div>
=======
		<div class="container-fluid">
			<div class="row" >
				<div class="col-md-4">
                    <form action="<?php echo base_url(); ?>index.php/welcome/voistlused" method="get" accept-charset="UTF-8">
						<B>Tulevased võistlused:</B> <BR>
                        <SELECT NAME="võistlused" SIZE="20" >

                            <?php if(isset($voistlused)){
                            foreach ($voistlused as $voistlus){ ?>
                            <OPTION value=<?php echo '"' . $voistlus->id . '"' ?>><?php echo $voistlus->nimi ?></OPTION>
                            <?php  }
                            } ?>

						</SELECT></br>
					<input type="submit" value="Vaata võistlust"></p>
					</form>

                    <?php if(isset($voistluse_info)) {?>
                        <d1> <?php echo $voistluse_info[0] -> nimi; ?></d1>
                        <p> <?php echo "distants; " . $voistluse_info[0] -> distants; ?></p>
                        <p> <?php echo "kuupäev: " . $voistluse_info[0] -> kuupäev; ?></p>
                    <?php } ?>

				</div>

				<div class="col-md-4">
                    <?php if(isset($võistlejad)){ ?>
                        <p>Kokku on registreerinud ennast sellele võistlusele <?php echo $count[0]->arv ?> inimest</p>
                        <B>Registreeritud sportlased:</B> <BR>
                        <SELECT NAME="Sportlased" SIZE="20" >
                            <?php foreach ($võistlejad as $võistleja){ ?>
                                <OPTION> <?php echo $võistleja-> eesnimi . " " . $võistleja-> perenimi ?></OPTION>
                            <?php  } ?>
                        </SELECT>
                    <?php } ?>
>>>>>>> 6aec5bc1ce1d400aefb4ad756e0115b71e80289e
				</div>
			</div>
		
	</section> 
</div>