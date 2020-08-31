<div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget  widget-user ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('https://images.unsplash.com/photo-1580070784162-c1d5e523dcd7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60') center center;">
              <h3 class="widget-user-username"><?= $data_sungai['nama'] ?></h3>
              <!-- <h5 class="widget-user-desc text-black">Nama Stasiun</h5> -->
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="data:image/jpeg;base64,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" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?= $data_sungai['luas'] ?></h5>
                    <span class="description-text">LUAS PENGALIRAN</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?= $data_sungai['panjang'] ?></h5>
                    <span class="description-text">PANJANG SUNGAI</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?= $data_sungai['kemiringan'] ?></h5>
                    <span class="description-text">KEMIRINGAN SUNGAI</span>
                  </div>
                  <!-- /.description-block -->
                </div>

                <!-- /.col -->
                                <!-- /.col -->
                <div class="col-sm-4">
                  
                  <!-- /.description-block -->
                </div>
                
                <!-- /.col -->
                                <!-- /.col -->
                <div class="col-sm-4">
                 
                  <!-- /.description-block -->
                </div>
                
                <!-- /.col -->
                                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                        <a href="#" class="text-muted idbutton_change"><i class="fa fa-external-link"></i> Change</a>
                  </div>
                  <!-- /.description-block -->
                </div>
                
                <!-- /.col -->
              </div>
              <!-- /.fa-external-link
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="tampil_modal"></div>
        <script type="text/javascript">
            $(document).ready( function(e) {
                $(document).on('click', '.idbutton_change', function(e) {
                      $.ajax({
                      type: "post",
                      url: "<?= site_url('Sungai/edit') ?>",
                      cache: false,
                      success: function(response) {
                        $('.tampil_modal').html(response);
                        $('#modal_edit').modal('show');
                      }
                    });
                });
            });
  
        </script>