<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">AKTIVITAS</h3>
                    </div>
                    <div class="box-body">

                        <div class="form">
                        <form method="post" id="form1">
                        </div>

                        <form id="form2">
                        <div class="column2">
                            <strong>Jenis Komponen</strong>
                            <select class="select2 form-control" name="nama_produk"id="nama_produk"></select>
                        </div>
                        <div class="column2">
                            <strong>Tanggal</strong>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal"  />
                        </div>
                        <div class="column2"></div>
                        <table class="table table-bordered table-striped" id="">
                            <thead>
                                <tr>       
                                    <th>ID Produk</th>                                                                 
                                    <th>Nama Produk</th>
                                    <th>ID Komponen</th>
                                    <th>Nama Komponen</th>
                                    <th>Jenis Komponen</th>
                                    <th>Jumlah Komponen</th>                                    
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>                        
                        <button class="btn btn-primary" id="submit" onclick="onklik();">Add All Item</button>
                        <button class="btn btn-default" id="Cancel">Cancel</button>                        
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
         
    });

     function test(){
       var id_suplier = $('#id_suplier').val();
        $.ajax({

            url : "<?php echo base_url();?>index.php/aktivitas/detailsuplier",
            method : "POST",
            data : {id : id_suplier},
            dataType : 'json',
            success : function(data){
                $('#nama_suplier').val(data.nama_suplier);
                $('#alamat').val(data.alamat);
            }
         })
     }

   
     $(document).ready(function(){
        $('.select2').select2();
         $.ajax({
            url : "<?php echo base_url();?>index.php/aktivitas/getproduk",
            success: function(data){
                $('#nama_produk').html(data);
            }
        });


        $("body").on('change', '#nama_produk', function(){
            var ktg = $('#nama_produk').val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/aktivitas/detailproduk",
                method : "POST",
                data : {prd : ktg},
                success : function(data){
                    
                    $('#tbody').html(data);
                    
                }
             })
        })           
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

     function onklik(){

        //$('#submit').on('click',function(event){ 
     var jenis_komponen   = $('#jenis_komponen').val();
      var id_produk   = $('#id_produk').val();
      var id_komponen   = $('#id_komponen').val();
      var nama_komponen = $('#nama_komponen').val();
      var jml_komponen  = $('#jml_komponen').val();
      var tanggal    = $('#tanggal').val();
      

        if(tanggal != '' ){

             $.ajax({                
             url : "<?php echo base_url();?>index.php/aktivitas/insertstok",
                method : "POST",
                data : $('[name="jenis_komponen[]"], [name="id_komponen[]"],[name="jml_komponen[]"],[name="id_produk[]"], [name="tanggal"]').serialize(),
                success : function(data){

                    alert('Update Stock Berhasil');
                     $('#notif').html('');
                    $('#form1')[0].reset();
                    nota();
                    $('#form2')[0].reset();
                    $('#table').html('');
                 
                } 
                 
            })
        }else{
            alert('DATA HARUS DIISI LENGKAP BRO');
            event.preventDefault();   
    }
     }
     
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