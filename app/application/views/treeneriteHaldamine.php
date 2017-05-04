<div class="container container2" id="content">
    <div class="row">
        <div class="col-xs-12" >
        <h4>Siit saate kasutajanimesid otsida:</h4>
        <form action="<?php echo base_url(); ?>index.php/welcome/admin" method="post" accept-charset="UTF-8">
            <p><input type="text" name="keyword">
            <input type="submit" value=<?php echo $this->lang->line('otsi_nupp')?>></p>
        </form>

        <?php if(isset($data)){ ?>
            <?php foreach($data as $result) { ?>
                <p><?php echo $result->kasutajanimi?></p>
            <?php }
        }?>
        </div>
    </div>

    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12" >
            <h4>Siia palun sisestada kasutajanimi, kelle õiguseid muuta tahate ning seejärel valik, mis ala treeneriks te teda muuta tahate</h4>
            <form action="<?php echo base_url(); ?>index.php/welcome/admin" method="post" accept-charset="UTF-8">
                <p><input type="text" name="user">
                    <select name="sportsSelect">
                        <option value="1">Vibu laskmise treener</option>
                        <option value="2">Ujumise treener</option>
                        <option value="3">Tennise treener</option>
                        <option value="4">Tõstmise treener</option>
                        <option value="5">Vehklemise treener</option>
                        <option value="6">Iluvõimlemise treener</option>
                        <option value="7">Kergejõustiku treener</option>
                        <option value="8">Rattasõidu treener</option>
                    </select>
                </p>
                <input type="submit" value="Salvesta">
            </form>
        </div>
    </div>
</div>