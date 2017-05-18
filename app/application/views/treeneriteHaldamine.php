<div class="container container2" id="content">
    <div class="row">
        <div class="col-xs-12" >
        <h4><?php echo $this->lang->line('admin_search_text')?></h4>
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
            <h4><?php echo $this->lang->line('admin_info_text')?></h4>
            <form action="<?php echo base_url(); ?>index.php/welcome/admin" method="post" accept-charset="UTF-8">
                <p><input type="text" name="user">
                    <select name="sportsSelect">
                        <option value="1"><?php echo $this->lang->line('vibu_treener')?></option>
                        <option value="2"><?php echo $this->lang->line('ujumise_treener')?></option>
                        <option value="3"><?php echo $this->lang->line('tennise_treener')?></option>
                        <option value="4"><?php echo $this->lang->line('tõstmise_treener')?>r</option>
                        <option value="5"><?php echo $this->lang->line('vehklemise_treener')?></option>
                        <option value="6"><?php echo $this->lang->line('iluvõimlemise_treener')?></option>
                        <option value="7"><?php echo $this->lang->line('kergejõustikku_treener')?></option>
                        <option value="8"><?php echo $this->lang->line('rattasõidu_treener')?></option>
                    </select>
                </p>
                <input type="submit" value="<?php echo $this->lang->line('save_btn')?>">
            </form>
        </div>
    </div>
</div>