<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">Input Rancangan</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;"">
                            <?php //echo anchor(site_url('updatestock/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                            <?php //echo anchor(site_url('kelolamenu/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                            <?php //echo anchor(site_url('kelolamenu/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i>Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
                        </div>

                        <div class="form">
                        <form method="post" id="form2">
                        <div class="column2">
                        <tr><td width ="200"><strong>  Id Produk </strong></td>
                            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder=""/>
                        </div>
                        <div class="column2">
                        <tr><td width ="200"><strong>  Nama Produk </strong></td>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder=""/>
                        </div>
                        <div class="column2">
                        <tr><td width ="200"><strong>  Nama Komponen </strong></td>
                            <?php echo cmb_dinamis('nama_komponen','tbl_master_komponen','nama_komponen','nama_komponen',$id_komponen) ?>
                        </div>
                        <div class="column2">
                        <tr><td width ="200"><strong>  Jumlah Komponen </strong></td>
                            <input type="number" class="form-control" name="jml_komponen" id="jml_komponen"/>
                        </div>
                        <div class="column2"><br>
                        <button class="btn btn-primary" type="button" id="buttonOk"> Add</button> 
                        </div>
                        <div class="column2"></div>
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>                                                                        
                                    <th>Id Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Nama Komponen</th>
                                    <th>Jml Komponen</th>
                                    <th>Action</th>                                    
                                </tr>
                            </thead>
                        </table>                        
                        <button class="btn btn-primary" id="submit">Add All Item</button>
                        <button class="btn btn-default" id="submit">Cancel</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/template/plugins/select2/select2.js"></script>
<link href="<?php echo base_url() ?>/template/plugins/select2/select2.css" rel="stylesheet" />
<script type="text/javascript">

        $('#buttonOk').on('click',function(){
            
        var id_produk        = $('#id_produk').val()
        var nama_produk        = $('#nama_produk').val()
        var nama_komponen        = $('#nama_komponen').val()
        var nama_komponen   = $('#nama_komponen option:selected').text()
        //var jenis_komponen  = $('#jenis_komponen').val()
        //var nama_kategori_komponen  = $('#jenis_komponen option:selected').text()
        //var harga_beli = $('#harga_beli').val()
        var jml_komponen = $('#jml_komponen').val()
        
        if(id_produk != '' && nama_produk != '' && nama_komponen != ''&& jml_komponen != ''){

        // var hargabarang = harga_beli.toString();
        // var harga = hargabarang.split('.').join('');
         //var total = jml_komponen;
         //var hrg = number_format(total,0,',','.');
         //console.log(total);

        $('#table').append(`<tr>  
        <td>${id_produk}<input type="hidden" value="${id_produk}" name="id_produk[]"/> </td>
        <td>${nama_produk}<input type="hidden" value="${nama_produk}" name="nama_produk[]"/> </td>          
            <td>${nama_komponen}<input type="hidden" value="${nama_komponen}" name="nama_komponen[]"/> </td>
             <td>${jml_komponen}<input type="hidden" value="${jml_komponen}" name="jml_komponen[]"/></td>
                          
            <td align="center"><button class="delete">delete</button></td>
            </tr>`)
        
       hapus()
                    var  totalhrg = 0;
                    var el = $('[name="total[]"]');
                    el.each(function(key, value){
                        totalhrg += parseInt($(this).val().toString().split('.').join(''));
                    });
       //console.log(totalhrg);
        $('#total_harga').html(number_format(totalhrg,0,',','.'));

                    var totalbrg = 0;
                    var tot = $('[name="jml_komponen[]"]');
                    tot.each(function(key, value){
                        totalbrg += parseInt($(this).val().toString().split('.').join(''));
                    })
        $('#total_komponen').html(number_format(totalbrg,0,',','.'));
        $('#jml_komponen').val('');
        //$('#harga_beli').val('');
        }else{
            alert('DATA KURANG LENGKAP');
            event.preventDefault();   
        }
     });
     function hapus(){
        $('.delete').on('click',function(){
            $(this).parent().parent().remove()

             var  totalhrg = 0;

       var el = $('[name="total[]"]');
       el.each(function(key, value){
        totalhrg += parseInt($(this).val().toString().split('.').join(''));

       });
        // $('#total_harga').html(number_format(totalhrg,0,',','.'));

        // var totalbrg = 0;
        // var tot = $('[name="jumlah_unit[]"]');
        // tot.each(function(key, value){
        //     totalbrg += parseInt($(this).val().toString().split('.').join(''));
        // })
        $('#total_barang').html(number_format(totalbrg,0,',','.'));
        
        })
     }
</script>

