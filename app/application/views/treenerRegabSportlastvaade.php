

<div class="container">
	<section id="content">
		<div class="container-fluid">
			<div class="row" >
				<div class="col-md-4">
                    <form action="<?php echo base_url(); ?>index.php/welcome/voistlused" method="get" accept-charset="UTF-8">
						<B>Tulevased võistlused:</B> <BR>
                        <SELECT NAME="Võistlused" SIZE="20" >

                            <?php if(isset($voistlused)){
                            foreach ($voistlused as $voistlus){ ?>
                            <OPTION value=<?php echo '"' . $voistlus->id . '"' ?>><?php echo $voistlus->nimi ?></OPTION>
                            <?php  }
                            } ?>

						</SELECT>
					<input type="submit" value="Vaata võistlust"></p>
					</form>
				</div>
				<div class="col-md-4"> 
						<B>Registreeritud sportlased:</B> <BR>
						<SELECT NAME="Sportlased" SIZE="20" MULTIPLE >
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
			</div>
		
	</section> 
	
</div>