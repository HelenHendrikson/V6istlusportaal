<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<?php
    if(isset($title)){
    echo "<title>" . $title . "</title>";
    } else {
    	echo "<title>Tiitli muutuja tühi</title>";
	}
    ?>

    <!-- Latest compiled and minified CSS -->

    <!-- Optional theme 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	-->


	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"  type="text/css" />  
	
	<script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-2.0.0.min.js"></script>
	<script>
		if (typeof jQuery == 'undefined') {
			document.write(unescape("%3Cscript src='/js/jquery-3.2.0.min.js' type='text/javascript'%3E%3C/script%3E"));
		}
	</script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css"  type="text/css" /> 
	
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script> -->
	
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>js/registreerimine.js"></script>
	<script src="<?php echo base_url(); ?>js/infoAboutCompetition.js"></script>
	<script src="<?php echo base_url(); ?>js/PiltideHilisemLaadimine.js"></script>
	<script src="<?php echo base_url(); ?>js/logging_in.js"></script>
	<script src="<?php echo base_url(); ?>js/voistluseLisamine.js"></script>
    <script src="<?php echo base_url(); ?>js/voistluseleRegamine.js"></script>


    <script>
	$(document).ready(function(){
		$("button").tooltip();   
	});
	</script> 


</head>
<body>
	<div class="avaleht">

		<nav class="navbar navbar-default">
			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">Võistlusportaal</a>
				</div>
		

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/"><?php echo $this->lang->line('spordialad');?></a></li>
                        <?php if ($this->session->userdata("sports_id") == 9) {?>
                            <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/admin"><?php echo $this->lang->line('treenerite_haldamine');?></a></li>
                        <?php } else if ($this->session->userdata("sports_id") != NULL) {?>
                            <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/otsing"><?php echo $this->lang->line('otsing');?></a></li>
                        <?php } ?>
                        <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/annetused"><?php echo $this->lang->line('annetused');?></a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						
						<li>
                            <?php if ($this->session->userdata("logged_in")) {?>
                                <form action=<?php echo base_url(); ?>index.php/login/log_out >
                                    <input id="logout" type="submit" class="btn btn-default navbar-button btn-special btn2" value="<?php echo $this->lang->line('log_out_button');?>" />
                                </form>
                            <?php } else {?>
                                <button id="login-toggle" type="button" class="btn btn-default navbar-button btn-special btn2" data-toggle="modal" data-modal-id="login-modal" data-target="#login-modal" data-placement="bottom" data-original-title="login" ><?php echo $this->lang->line('logi_sisse_nupp');?></button>
                            <?php } ?>
                        </li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/english">
								<img src="<?PHP echo base_url(); ?>images/eng.png" alt="Inglise keel" class="img-keel"/>
							</a>
						</li>

						<li>
							<a href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/estonian'>
								<img src="<?PHP echo base_url(); ?>images/est.png" alt="Eesti keel" class="img-keel" />
							</a>
						</li>

					</ul>
					
				</div>
				
			</div>
		</nav> 
	
</div>

<?php include 'sisselogimine.php' ?>

	
