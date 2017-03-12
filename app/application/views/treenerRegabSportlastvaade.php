

<div class="container">
	<section id="content">
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
                        <B>Registreeritud sportlased:</B> <BR>
                        <SELECT NAME="Sportlased" SIZE="20" >
                            <?php foreach ($võistlejad as $võistleja){ ?>
                                <OPTION> <?php echo $võistleja-> eesnimi . " " . $võistleja-> perenimi ?></OPTION>
                            <?php  } ?>
                        </SELECT>
                    <?php } ?>
				</div>
			</div>
		
	</section> 
	
</div>