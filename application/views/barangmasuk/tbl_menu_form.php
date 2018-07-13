<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT BARANG MASUK</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Tanggal <?php echo form_error('tgl_masuk_i') ?></td><td><input type="date" class="form-control" name="tgl_masuk_i" id="tgl_masuk_i" placeholder="Tanggal Masuk Barang" value="<?php echo $tgl_masuk_i; ?>" /></td></tr>
	    <tr><td width='200'>ID Komponen <?php echo form_error('id_komponen_i') ?></td><td><input type="text" class="form-control" name="id_komponen_i" id="id_komponen_i" placeholder="ID Barang" value="<?php echo $id_komponen_i; ?>" /></td></tr>
	    <tr><td width='200'>Nama Komponen <?php echo form_error('nama_komponen_i') ?></td><td><input type="text" class="form-control" name="nama_komponen_i" id="nama_komponen_i" placeholder="Nama Barang" value="<?php echo $nama_komponen_i; ?>" /></td></tr>
        <tr><td width='200'>Stok Masuk <?php echo form_error('stock_masuk_i') ?></td><td><input type="text" class="form-control" name="stock_masuk_i" id="stock_masuk_i" placeholder="Stok Masuk" value="<?php echo $stock_masuk_i; ?>" /></td></tr>
        
	    <!-- <tr><td width='200'>Stok Masuk<?php echo form_error('stock_masuk_i') ?></td><td>                            <select name="stock_masuk_i" class="form-control">
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

	    <tr><td></td><td><input type="hidden" name="" value="" /> <!-- <?php echo $id_komponen; ?> -->
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('barangmasuk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>