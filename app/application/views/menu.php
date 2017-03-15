<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="170033066137-gftsp3892marqlc68sf036u5gbn0otv3.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css"  type="text/css" /> 
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
	
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="<?php echo base_url(); ?>js/googlelogin.js"></script>
	
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>


</head>
<body>
	<div class="avaleht">

		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Võistlusportaal</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/"><?php echo $this->lang->line('spordialad');?></a></li>
						<li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/otsing"><?php echo $this->lang->line('otsing');?></a></li>
					    <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/voistlused"><?php echo $this->lang->line('voistlused');?></a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						
						<li>
							<button type="button" id="login" "class="btn btn-default navbar-button pull-right" data-toggle="tooltip" data-placement="bottom" title="Siit saad sisse logida">Logi sisse</button>							
							
						</li>
						<li>
							<div class="g-signin2 pull-right" data-onsuccess="onSignIn" data-theme="dark"></div>
						</li>

						<li>
							<a href="<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/english">
								<img src="<?PHP echo base_url(); ?>images/eng.png" alt="Not found" class="img-keel"/>
							</a>
						</li>

						<li>
							<a href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/estonian'>
								<img src="<?PHP echo base_url(); ?>images/est.png" alt="Not found" class="img-keel" />
							</a>
						</li>		

					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>