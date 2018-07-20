<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KOMPONEN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            
        <table class='table table-bordered>'        

	    <tr>
            <td width='200'>Jenis Komponen <?php echo form_error('jenis_komponen') ?>
            </td>

            <td><input type="text" class="form-control" name="jenis_komponen" id="jenis_komponen" placeholder="Jenis Komponen" required value="<?php echo $jenis_komponen; ?>" />
            </td>
        </tr>

	    <tr>
            <td width='200'>Nama Kategori <?php echo form_error('nama_kategori') ?>
            </td>
            <td><input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
            </td>
        </tr>

	    <tr>
            <td width='200'>Keterangan <?php echo form_error('keterangan') ?>
            </td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
            </td>
        </tr>

	    <tr>
            <td>
            </td>
            <td>
	           <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?>
               </button> 
	                <a href="<?php echo site_url('kategorikomponen') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
            </td>
        </tr>

        </table>
            </form>        
        </div>
    </div>
</div>