<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KOMPONEN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
        <table class='table table-bordered>'        

	    <tr>
            <td width='200'>ID Komponen <?php echo form_error('id_komponen') ?>
            </td>

            <td><input type="text" class="form-control" name="id_komponen" id="id_komponen" placeholder="ID Komponen" required value="<?php echo $id_komponen; ?>" />
            </td>
        </tr>

	    <tr>
            <td width='200'>Nama Komponen <?php echo form_error('nama_komponen') ?>
            </td>
            <td><input type="text" class="form-control" name="nama_komponen" id="nama_komponen" placeholder="Nama Komponen" value="<?php echo $nama_komponen; ?>" />
            </td>
        </tr>

	    <tr>
            <td width='200'>Keterangan <?php echo form_error('keterangan') ?>
            </td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Jenis Komponen" value="<?php echo $keterangan; ?>" />
            </td>
        </tr>

        <tr>
            <td width='200'>Foto Profile <?php echo form_error('gambar_komponen') ?>
            </td>
            <td> <input type="file" name="gambar_komponen">
            </td>
        </tr>

	    <tr>
            <td>
            </td>
            <td><input type="hidden" name="stock_komponen" value="<?php echo $stock_komponen; ?>" /> 
	           <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?>
               </button> 
	                <a href="<?php echo site_url('stockkomponen') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
            </td>
        </tr>

        </table>
            </form>        
        </div>
    </div>
</div>