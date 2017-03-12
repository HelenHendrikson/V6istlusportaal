

<div class="container">
	<section id="content">
		<div class="container-fluid">
			<div class="row" >
				<div class="col-md-4"> 
						<B>Vali võistlus:</B> <BR>
						<SELECT NAME="Võistlused" SIZE="20" MULTIPLE >
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