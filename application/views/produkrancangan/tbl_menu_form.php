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
