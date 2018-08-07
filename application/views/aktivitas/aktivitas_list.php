<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">AKTIVITAS</h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;"">
                            <?php //echo anchor(site_url('aktivitas/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                            <?php echo anchor(site_url('kelolamenu/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
                            <?php echo anchor(site_url('kelolamenu/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
                        </div>

                        <div class="form">
                        <form method="post" id="form1">
                        <div class="column">    
                        <table>
                                <tr><td width ="200"><strong>  Id Suplier </strong></td>
                                <td width="300"><select class="select2 form-control" name="id_suplier" id="id_suplier" ></select></td></tr>
                        </table>
                        </div>
                        <div class="column">
                        <table>
                                <tr><td width ="200"><strong>  Nota </strong></td>
                                <td width="300"><input type="text" class="form-control" name="nota" id="nota" placeholder="Nota"  /></td></tr>
                        </table>
                        </div>
                        </form>

                        <form id="form2">
                        <div class="column2">
                            <strong>Jenis Komponen</strong>
                            <select class="select2 form-control" id="jenis_komponen"></select>
                        </div>
                        <div class="column2">
                            <strong>Nama Komponen</strong>
                            <select class="select2 form-control" id="id_komponen"></select>
                        </div>
                        <div class="column2">
                            <strong>Komponen Keluar</strong>
                            <input type="text" class="form-control" name="komponen_keluar" id="komponen_keluar" placeholder="Komponen Keluar"/>
                            </div>
                        <div class="column2">
                            <strong>Komponen Masuk</strong>
                            <input type="text" class="form-control" name="komponen_masuk" id="komponen_masuk" placeholder="Komponen Masuk"/>
                            </div>
                        <div class="column2">
                            <strong>Nama Produk </strong>
                            <select class="select2 form-control" id="id_produk"></select>
                        </div>
                        <div class="column2">
                            <strong>Tgl Aktivitas </strong>
                            <input type="date" class="form-control" name="tgl_aktivitas" id="tgl_aktivitas" placeholder="Tanggal Aktivitas"/>
                        </div>
                        <div class="column2">
                            <strong>Keterangan</strong>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder=""/>
                        </div>
                        <div class="column2"><br>
                        <button class="btn btn-primary" type="button" id="buttonOk"> Add</button> 
                        </div>
                        <div class="column2"></div>
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>                                                                       
                                    <th>Jenis Komponen</th>
                                    <th>Nama Komponen</th>
                                    <th>Komponen Keluar</th>
                                    <th>Komponen Masuk</th>
                                    <th>Nama Produk</th>
                                    <th>Tanggal Aktivitas</th>
                                    <th>Keterangan</th>
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
     $(document).ready(function(){
         $.ajax({
            url : "<?php echo base_url();?>index.php/aktivitas/getsuplier",
            success: function(data){
                $('#id_suplier').html(data);
            }
    });
    $(document).ready(function(){
         $.ajax({
            url : "<?php echo base_url();?>index.php/aktivitas/getjeniskomponen",
            success: function(data){
                $('#id_suplier').html(data);
            }
    });
     $('#buttonOk').on('click',function(){
        var komponen        = $('#komponen').val()
        var nama_komponen   = $('#komponen option:selected').text()
        var jenis_komponen  = $('#jenis_komponen').val()
        var nama_jeniskomponen = $('#jenis_komponen option:selected').text()
        //var harga_beli = $('#harga_beli').val()
        var jml_komponen = $('#jml_komponen').val()
        if(komponen != '' && jenis_komponen != '' && jml_komponen != ''){

        // var hargabarang = harga_beli.toString();
        // var harga = hargabarang.split('.').join('');
         var total = jml_komponen;
         var hrg = number_format(total,0,',','.');
         //console.log(total);

        $('#table').append(`<tr>            
            <td>${nama_komponen}<input type="hidden" value="${komponen}" name="komponen[]"/> </td>
             <td>${nama_jeniskomponen} <input type="hidden" value="${nama_jeniskomponen}" name="nama_jeniskomponen[]"/></td>
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
            alert('DATA HARUS DIISI LENGKAP');
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
      var komponen      = $('#komponen').val();
      var jenis_komponen  = $('#jenis_komponen').val();
      //var nota_beli = $('#nota_beli').val();
      var jml_komponen  = $('#jml_komponen').val();
      //var keterangan    = $('#keterangan').val();
      
        if(id_suplier != '' && id_komponen != '' && jenis_komponen != '' && jml_komponen != ''){
             $.ajax({
             url : "<?php echo base_url();?>index.php/updatestock/insertstok",
                method : "POST",
                data : $('[name="id_suplier"], [name="komponen[]"], [name="nama_jeniskomponen[]"], [name="jml_komponen[]"]').serialize(), 
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
<script type="text/javascript">
          function tandaPemisahTitik(b){
                var _minus = false;
                    if (b<0) _minus = true;
                    b = b.toString();
                    b=b.replace(".","");
                    b=b.replace("-","");
                    c = "";
                    panjang = b.length;
                    j = 0;
                    for (i = panjang; i > 0; i--){
                        j = j + 1;
                        if (((j % 3) == 1) && (j != 1)){
                        c = b.substr(i-1,1) + "." + c;
                        } else {
                        c = b.substr(i-1,1) + c;
                                }
                    }
              if (_minus) c = "-" + c ;
              return c;
        }
function numbersonly(ini, e){
if (e.keyCode>=49){
if(e.keyCode<=57){
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
ini.value = tandaPemisahTitik(b);
return false;
}
else if(e.keyCode<=105){
if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
return false; }
}else if (e.keyCode==48){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==95){
a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
b = a.replace(/[^\d]/g,"");
if (parseFloat(b)!=0){
ini.value = tandaPemisahTitik(b);
return false;
} else {
return false;
}
}else if (e.keyCode==8 || e.keycode==46){
a = ini.value.replace(".","");
b = a.replace(/[^\d]/g,"");
b = b.substr(0,b.length -1);
if (tandaPemisahTitik(b)!=""){
ini.value = tandaPemisahTitik(b);
} else {
ini.value = "";
}

return false;
} else if (e.keyCode==9){
return true;
} else if (e.keyCode==17){
return true;
} else {
//alert (e.keyCode);
return false;
}

}
</script>



<!-- CSS Manual -->
<style>
            .form{
                float: left;
                width: 100%;
                padding: 10px;
            }
            .column{
                float: left;
                width: 100%;
                padding: 10px;
            }
            .column2{
                float: left;
                width: 70%;
                padding: 15px;
                padding-top: 30px;

            }
            @media screen and (max-width:600px) {
            .column {
            width: 100%;
                        }
            .column {
            width: 100%;
                        }
            }
            </style>
            <style>
            .form{
                float: left;
                width: 100%;
                padding: 10px;
            }
            .column{
                float: left;
                width: 100%;
                padding: 10px;
            }
            .column2{
                float: left;
                width: 25%;
                padding: 10px;
                padding-top: 30px;

            }
            @media screen and (max-width:600px) {
            .column {
            width: 100%;
                        }
            .column {
            width: 100%;
                        }
            }
</style>