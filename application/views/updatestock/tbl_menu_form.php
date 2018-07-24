<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT STOCK</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'>        

	    <tr>
            <td width='200'>ID Suplier <?php echo form_error('id_suplier') ?></td><td><input type="text" class="form-control" name="id_suplier" id="id_suplier" placeholder="ID Suplier" value="<?php echo $id_suplier; ?>" /></td>
        </tr>
        <tr>
            <td width='200'>Komponen <?php echo form_error('id_komponen') ?></td><td><input type="text" class="form-control" name="id_komponen" id="id_komponen" placeholder="ID Komponen" value="<?php echo $id_komponen; ?>" /></td>
        </tr>
	    <tr>
            <td width='200'>Jenis Komponen <?php echo form_error('jenis_komponen') ?></td><td><input type="text" class="form-control" name="jenis_komponen" id="jenis_komponen" placeholder="Jenis Komponen" value="<?php echo $jenis_komponen; ?>" /></td>
        </tr>
	    <tr>
            <td width='200'>Jumlah Komponen <?php echo form_error('jml_komponen') ?></td><td><input type="text" class="form-control" name="jml_komponen" id="jml_komponen" placeholder="Jumlah Komponen" value="<?php echo $jml_komponen; ?>" /></td>
        </tr>
	    <!-- <tr><td width='200'>Is Main Menu <?php echo form_error('is_main_menu') ?></td><td>                            <select name="is_main_menu" class="form-control">
                                <option value="0">MAIN MENU</option>
                                <?php
                                $menu = $this->db->get('tbl_menu')->result();
                                foreach ($menu as $m){
                                    echo "<option value='$m->id_menu' ";
                                    echo $m->id_menu==$is_main_menu?'selected':'';
                                    echo ">".  strtoupper($m->title)."</option>";
                                }
                                ?>
                            </select></td></tr>
            <tr><td width='200'>Is Aktif <?php echo form_error('is_aktif') ?></td><td><?php echo form_dropdown('is_aktif',array('y'=>'AKTIF','n'=>'TIDAK'),$is_aktif,array('class'=>'form-control'))?></td></tr> -->
	    <tr><td></td><td><!-- <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" /> --> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('updatestock') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>