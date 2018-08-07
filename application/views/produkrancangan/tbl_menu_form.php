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
                            <input type="text" class="form-control" name="nama_komponen" id="nama_komponen" placeholder=""/>
                        </div>
                        <div class="column2">
                        <tr><td width ="200"><strong>  Jumlah Komponen </strong></td>
                            <input type="number" class="form-control" name="jml_komponen" id="jml_komponen" placeholder=""/>
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
<script type="text/javascript">
     $(document).ready(function(){
         $.ajax({
            url : "<?php echo base_url();?>index.php/aktivitas/getsuplier",
            success: function(data){
                $('#id_suplier').html(data);
            }

        });        
         
    });
     $(document).ready(function(){
         $.ajax({
            url : "<?php echo base_url();?>index.php/aktivitas/getjeniskomponen",
            success: function(data){
                $('#komponen').html(data);
            }
        });
    


     $('#buttonOk').on('click',function(){
        var komponen        = $('#komponen').val()
        var nama_komponen   = $('#komponen option:selected').text()
        var jenis_komponen  = $('#jenis_komponen').val()
        var nama_kategori_komponen  = $('#jenis_komponen option:selected').text()
        //var harga_beli = $('#harga_beli').val()
        var jml_komponen = $('#jml_komponen').val()
        if(komponen != '' && jenis_komponen != '' && jml_komponen != ''){

        // var hargabarang = harga_beli.toString();
        // var harga = hargabarang.split('.').join('');
         //var total = jml_komponen;
         //var hrg = number_format(total,0,',','.');
         //console.log(total);

        $('#table').append(`<tr>            
            <td>${nama_komponen}<input type="hidden" value="${komponen}" name="komponen[]"/> </td>
             <td>${nama_kategori_komponen} <input type="hidden" value="${jenis_komponen}" name="jenis_komponen[]"/></td>
             <td>${jml_komponen} <input type="hidden" value="${jml_komponen}" name="jml_komponen[]"/></td>
                          
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

     $('#submit').on('click',function(event){    
      var id_suplier    = $('#id_suplier').val();
      var nama_suplier  = $('#nama_suplier').val();
      var alamat        = $('#alamat').val();
      var komponen      = $('#komponen').val();
      var jenis_komponen  = $('#jenis_komponen').val();
      var nota_beli     = $('#nota_beli').val();
      var jml_komponen  = $('#jml_komponen').val();
      //var keterangan    = $('#keterangan').val();
      
        if(id_suplier != '' && nama_suplier != '' && alamat != '' && id_komponen != '' && jenis_komponen != '' && nota_beli != '' && jml_komponen != ''){
             $.ajax({
             url : "<?php echo base_url();?>index.php/updatestock/insertstok",
                method : "POST",
                data : $('[name="komponen[]"], [name="jenis_komponen[]"], [name="jml_komponen[]"], [name="id_suplier"], [name="nota_beli"], [name="keterangan"]').serialize(), 
                dataType:'json',
                success : function(data){
                    alert('Berhasil');
                     $('#notif').html('');
                    $('#form1')[0].reset();
                    nota();
                    $('#form2')[0].reset();
                    $('#table').html('');
                   return false  
                } 
                 
        })
        return false
        }else{  
            alert('DATA HARUS DIISI LENGKAP');
            event.preventDefault();   
    }
     })
     
    $('#Cancel').on('click', function(){
        // event.preventDefault()

        $('#form1')[0].reset();
        nota();
        $('#form2')[0].reset();
        $('#table').html('');
        $('#notif').html('');
        return false

    })
</script>
<script type="text/javascript">
            function number_format (number, decimals, decPoint, thousandsSep) { 
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''

                var toFixedFix = function (n, prec) {
                 var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
            .toFixed(prec)
            }

 // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
                if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
                    }
                    if ((s[1] || '').length < prec) {
                     s[1] = s[1] || ''
                     s[1] += new Array(prec - s[1].length + 1).join('0')
                    }

             return s.join(dec)
                }
</script>

