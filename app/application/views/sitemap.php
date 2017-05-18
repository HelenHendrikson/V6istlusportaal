
<div class="container container2" id="content">
	<div class="row">
		<div class="col-xs-6">

			<h2>Sitemap</h2>
			<h3>
				<a class="footerText" href="<?php echo base_url(); ?>index.php/welcome/" ><?php echo $this->lang->line('spordialad');?></a>
			</h3>
			<?php if ($this->session->userdata("sports_id") == 9) {?>
				<h3>
                    <a class="footerText" href="<?php echo base_url(); ?>index.php/welcome/admin"><?php echo $this->lang->line('treenerite_haldamine');?></a>
				</h3>
			<?php }  else if ($this->session->userdata("sports_id") != null) {?>
                <h3>
                    <a class="footerText" href="<?php echo base_url(); ?>index.php/welcome/otsing"><?php echo $this->lang->line('otsing');?></a>
                </h3>
		    <?php } ?>
			<h3>
				<a class="footerText" href="<?php echo base_url(); ?>index.php/welcome/annetused"><?php echo $this->lang->line('annetused');?></a>
			</h3>
			
		</div>	
	</div>
</div>