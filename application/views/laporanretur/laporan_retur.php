<!-- Main content -->
<div class="content-wrapper">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box box-warning box-solid'>
                <div class='box-header'> <h3 class='box-title'>LAPORAN RETUR BARANG</h3>  
                  </div>
                      
                      <div class='box-body'>
                        <div style="padding-bottom: 10px;"'>
                          <?php echo anchor(site_url('Laporanretur/excel'), ' <i class="fa fa-file-excel-o"></i> Export To Excel', 'class="btn btn-primary btn-sm"'); ?>
                          <?php echo anchor(site_url('Laporanretur/word'), '<i class="fa fa-file-word-o"></i> Export To Word', 'class="btn btn-success btn-sm"'); ?>
                          <?php echo anchor(site_url('Laporanretur/pdf'), '<i class="btn btn-danger btn-sm">Export To PDF</i>',array('target'=>'_blank')); ?>
                  </div>
                <form>
              
                <table class='table table-bordered table-striped' id="tabel">
                    <thead>
                        <tr>
                           <th>  Id Aktivitas</th>
                           <th> Nama Suplier </th>
                            <th> Nama Komponen</th>
                            <th> ID Komponen</th>
                            <th> Nama Komponen</th>
                            <th> Jumlah Komponen</th>
                            

                        </tr>
                    </thead>
                    <tbody id="tablear">
                       

                    </tbody>

                </table>
            </form>

    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
        
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){   
               $("").dataTable();
            get_data(); 
      });
            function get_data(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/Laporanretur/getall',
                method : "POST",
                async : false,
                dataType : 'json',
                success : function(all){
                    var table = '';
                    var i;
                    for (i=0; i<all.length; i++){
                       table += '<tr>'+'<td>'+all[i].id_aktivitas+'</td>'+
                       '<td>'+ all[i].nama_suplier+'</td>'+
                       '<td>'+ all[i].nama_kategori+'</td>'+
                       '<td>'+ all[i].id_komponen+'</td>'+
                       '<td>'+ all[i].nama_komponen+'</td>'+
                       '<td>'+ all[i].jumlah_komponen+'</td>'+
                       /*'<td>'+ '<button class="fa fa-trash-o del" idtrans="'+all[i].id_transaksi+'"></button>'+'</td>'+*/
                       '</tr>';
                    }
                    $('#tablear').html(table);
                    del();
                }
            });
        }

            function del(){
            $('.del').on('click',function(event){

                event.preventDefault();

                var notif = confirm("Apakah anda yakin menghapus data ?")
                if(notif){

                let idtrans = $(this).attr('idtrans');
               // console.log(idtrans)
            
            $.ajax({
                type: 'POST',
                data: {id :idtrans},
                url: '<?php echo base_url()?>index.php/Laporanretur/delete',
                success: function(result) {
                       get_data()
                        }
            });
                }
            return false;
        }) }
        </script>
 <!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#tabel").dataTable();
            });
        </script> -->