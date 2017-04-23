
<div class="container" id="content">
	<div class="row">
		<div class="col-xs-6">

			<h2>Sitemap</h2>
			<h3>
				<a class="footerText" href="/index.php/welcome/" >Spordialad</a>
			</h3>
			<?php if ($this->session->userdata("sports_id") != NULL) {?>
				<h3>
                    <a class="footerText" href="<?php echo base_url(); ?>index.php/welcome/otsing"><?php echo $this->lang->line('otsing');?></a>
				</h3>
			<?php } ?>
		
			<h3>
				<a class="footerText" href="/index.php/welcome/annetused" >Anneta</a>
			</h3>
			
		</div>	
	</div>
</div>