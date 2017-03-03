<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	
	<?php 
    if(isset($title)){
    echo "<title>" . $title . "</title>";
    } else {
    	echo "<title>Tiitli muutuja tühi</title>";
	}
    ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"  type="text/css" />
	<!-- Siia saab lisada bootstrap theme ka näiteks
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/navbar-theme2.css"  type="text/css" /> 
	-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
</head>
<body>

	<nav class="navbar navbar-default">
	    <div class="container-fluid">
	
	        <!--Menu Items-->
	        <div>
	            <ul class="nav navbar-nav">
	            	<li><a href="" class="navbar-brand">Veebirakenduste loomine</a></li>
	                <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/">Avalehekülg</a></li>
	                <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/otsing">Otsing</a></li>
	                <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/kkk">Korduma kippuvad küsimused</a></li>
	                <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/reklaam">Reklaam</a></li>
	                <li class="all"><a href="<?php echo base_url(); ?>index.php/welcome/kontakt">Kontakt</a></li>
	            </ul>
	        </div>
	    </div>
	</nav>

