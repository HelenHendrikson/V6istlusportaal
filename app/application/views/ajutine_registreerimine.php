
<h1>See on ajutine registreerimisleht</h1>

<div>
<form action="<?php echo base_url(); ?>index.php/ajutine/data_submitted/" method="post" accept-charset="UTF-8">
    <p><?php echo $this->lang->line('kasutajanimi');?><input type="text" name="kasutajanimi">
    <p><?php echo $this->lang->line('eesnimi');?><input type="text" name="eesnimi">
    <p><?php echo $this->lang->line('perenimi');?><input type="text" name="perenimi">
    <p><?php echo $this->lang->line('meiliaadress');?><input type="text" name="meil">
    <p><?php echo $this->lang->line('salasõna');?><input type="text" name="parool">
    <p><?php echo $this->lang->line('salasõna_kinnitus');?><input type="text" name="parooli_kinnitus">
    <p><input type="submit" value=<?php echo $this->lang->line('registreeri');?>></p>
</form>

</div>
	

</body>
</html>