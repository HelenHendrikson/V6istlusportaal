
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	<title>Login</title>
	<?php 
    if(isset($title)){
    echo "<title>" . $title . "</title>";
    } else {
    	echo "<title>Tiitli muutuja tühi</title>";
	}
    ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"  type="text/css/main.css" />
	<!-- Siia saab lisada bootstrap theme ka näiteks
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/navbar-theme2.css"  type="text/css" /> -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
</head>
<body>
<<<<<<< HEAD
	<d1><b>See on ajutine registreerimisleht</b></d1>
	<p>Kasutajanimi: <input></input>
	<p>Eesnimi: <input></input>
	<p>Perenimi: <input></input>
	<p>Meiliaadress: <input></input>
	<p>Salasõna: <input></input>
	<p>Salasõna kinnitus: <input></input>
	<p> <button type="button" >Registreeri</button> </p>
=======
	<form action="<?php echo base_url(); ?>index.php/ajutine/data_submitted/", method="post", accept-charset="UTF-8">
		<d1><b>See on ajutine registreerimisleht</b></d1>
		<p>Kasutajanimi: <input type="text", name="kasutajanimi">
		<p>Eesnimi: <input type="text", name="eesnimi">
		<p>Perenimi: <input type="text", name="perenimi">
		<p>Meiliaadress: <input type="text", name="meil">
		<p>Salasõna: <input type="text", name="parool">
		<p>Salasõna kinnitus: <input type="text", name="parooli_kinnitus">
		<p><input type="submit" value="Registreeri"></p>
	</form>
	
	

	
>>>>>>> b9072c5384a7512c35e3081482cbff69f2c869e4

</body>
</html>