
        <!-- Main content -->
        <div class="content-wrapper">
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Menu Read</h3>
        <table class="table table-bordered">
        <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	    <tr><td>Is Main Menu</td><td><?php echo $is_main_menu; ?></td></tr>
	    <tr><td>Is Aktif</td><td><?php echo $is_aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kelolamenu') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div>