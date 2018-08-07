<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">MASTER PRODUK</h3>
                    </div>
                    <div class="box-body">
                        <div class="form">
                        <form method="post" id="form1">
                        <div class="column"> 
                            <table>
                                <tr><td width ="200"> <strong>ID Produk</strong> </td>
                                <td width="300"><input type="text" class="form-control" id="id_produk" name="id_produk"/></td></tr>
                            </table>
                        </div>
                        <div class="column"> 
                            <table>
                                <tr><td width ="200"> <strong>Nama Produk</strong> </td>
                                <td width="300"><input type="text" class="form-control" id="nama_produk" name="nama_produk"/></td></tr>
                            </table>
                        </div>
                        </div>
                        </form>

                        <form id="form2">
                        <div class="column2">
                            <strong>Jenis Komponen</strong>
                            <select class="select2 form-control" id="komponen"></select>
                        </div>
                        <div class="column2">
                            <strong>ID Komponen</strong>
                            <select class="select2 form-control" name="id_komponen" id="id_komponen"></select>
                        </div>
                        <div class="column2">
                            <strong>Jumlah Komponen</strong>
                            <input type="number" class="form-control" name="jml_komponen" id="jml_komponen" placeholder="Jumlah Komponen"/>
                        </div>
                        <div class="column2"><br>
                        <button class="btn btn-primary" type="button" id="buttonOk"> Add</button> 
                        </div>
                        <div class="column2"></div>
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>                                                                        
                                    <th>Jenis Komponen</th>
                                    <th>ID Komponen</th>
                                    <th>Jumlah Komponen</th>
                                    <th>Action</th>                                    
                                </tr>
                            </thead>
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
        $('.select2').select2();
         $.ajax({
            url : "<?php echo base_url();?>index.php/masterproduk/getkomponen",
            success: function(data){
                $('#komponen').html(data);
            }
        });

        $("body").on('change', '#komponen', function(){
            var ktg = $('#komponen').val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/masterproduk/detailkomponen",
                method : "POST",
                data : {ctg : ktg},
                success : function(data){
                    $('#id_komponen').html(data);
                }
             })
        })           
    });

     $('#buttonOk').on('click',function(){
        var komponen        = $('#komponen').val()
        var nama_komponen   = $('#komponen option:selected').text()
        var id_komponen  = $('#id_komponen').val()
        var nama_kategori_komponen  = $('#id_komponen option:selected').text()
        //var harga_beli = $('#harga_beli').val()
        var jml_komponen = $('#jml_komponen').val()
        if(komponen != '' && id_komponen != '' && jml_komponen != ''){

        // var hargabarang = harga_beli.toString();
        // var harga = hargabarang.split('.').join('');
         //var total = jml_komponen;
         //var hrg = number_format(total,0,',','.');
         //console.log(total);

        $('#table').append(`<tr>            
            <td>${nama_komponen}<input type="hidden" value="${komponen}" name="komponen[]"/> </td>
             <td>${nama_kategori_komponen}<input type="hidden" value="${id_komponen}" name="id_komponen[]"/></td>
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

     function onklik(){

        //$('#submit').on('click',function(event){    
      var id_produk    = $('#id_produk').val();
      var nama_produk  = $('#nama_produk').val();
      var komponen      = $('#komponen').val();
      var id_komponen= $('#id_komponen').val();
      
      //var jml_komponen  = $('#jml_komponen').val();
      //var keterangan    = $('#keterangan').val();

        if(id_produk != '' && nama_produk != '' && komponen != '' && id_komponen != '' && jml_komponen != ''){

             $.ajax({                
             url : "<?php echo base_url();?>index.php/masterproduk/insertstok",
                method : "POST",
                data : $('[name="id_produk"], [name="nama_produk"], [name="id_komponen[]"], [name="jml_komponen[]"]').serialize(), 
                dataType:'json',
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