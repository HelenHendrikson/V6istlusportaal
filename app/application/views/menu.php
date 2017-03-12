<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="170033066137-gftsp3892marqlc68sf036u5gbn0otv3.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	<?php
    if(isset($title)){
    echo "<title>" . $title . "</title>";
    } else {
    	echo "<title>Tiitli muutuja tühi</title>";
	}
    ?>
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"  type="text/css" />
	 Siia saab lisada bootstrap theme ka näiteks-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/navbar-theme2.css"  type="text/css" />  
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css"  type="text/css" /> 
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"  type="text/css" /> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
</head>
<body>
	<div class="avaleht">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
		
				<!--Menu Items-->
				<div class="navbar-header">
					<ul class="nav navbar-nav navbar-left">
						<li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/"><?php echo $this->lang->line('spordialad');?></a></li>
						<li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/otsing"><?php echo $this->lang->line('otsing');?></a></li>
					   <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/voistlused"><?php echo $this->lang->line('voistlused');?></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<script src="<?php echo base_url(); ?>js/googlelogin.js"></script>
						<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
						
						<button type="button" class="btn"><a href="<?php echo base_url(); ?>index.php/welcome/login"> Logi sisse </a></button>
                        <a href="<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/english">
                            <img src="<?PHP echo base_url(); ?>images/eng.png" id="languageimg"/>
                        </a>
                        <a href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/estonian'>
                            <img src="<?PHP echo base_url(); ?>images/est.png" id="languageimg"/>
                        </a>

					</ul>
				</div>
			</div>
		</nav>
	</div>