<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	<title>Otsing</title>
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
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
</head>
<body>


<h1>Siia peaks tegema sportlaste otsingu</h1>
<br/>
	
<form action="<?php echo base_url(); ?>index.php/welcome/get_data", method="get", accept-charset="UTF-8">
	<p><input type="text", name="keyword">
	<input type="submit" value="Otsi"></p>
</form>

<?php if(isset($results)){ ?>
	<br/>
	<?php foreach($results as $result){ ?>
		<p><?php echo $result->eesnimi ?></p>
	<?php } ?>
<?php } ?>
	
</body>
</html>