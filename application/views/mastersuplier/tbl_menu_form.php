<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA SUPLIER</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" >
            
        <table class='table table-bordered>'        

	    <tr>
            <td width='200'>ID Suplier <?php echo form_error('id_suplier') ?>
            </td>

            <td><input readonly type="text" class="form-control" name="id_suplier" id="id_suplier" placeholder="ID Suplier" required value="<?php echo $id_suplier; ?>" />
            </td>
        </tr>

	    <tr>
            <td width='200'>Nama Suplier <?php echo form_error('nama_suplier') ?>
            </td>
            <td><input type="text" class="form-control" name="nama_suplier" id="nama_suplier" placeholder="Nama Suplier" required value="<?php echo $nama_suplier; ?>" />
            </td>
        </tr>

	    <tr>
            <td width='200'>Alamat <?php echo form_error('alamat') ?>
            </td>
            <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required value="<?php echo $alamat; ?>" />
            </td>
        </tr>

	    <tr>
            <td>
            </td> 
            <td>
	           <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?>
               </button> 
	                <a href="<?php echo site_url('mastersuplier') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
            </td>
        </tr>

        </table>
            </form>        
        </div>
    </div>
</div>