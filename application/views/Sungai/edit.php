<div class="modal fade" id="modal_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Ubah Data Sungai</h4>
			</div>
			<?= form_open('Sungai/update', ['class' => 'form_edit']) ?>
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
		                <div class="col-lg-4 col-xs-4 border-left">
							<label>Nama Sungai</label>
		                </div>
		                <div class="col-lg-6 col-xs-6 ">
							<input type="text" class="form-control" placeholder="Sungai Nill" name="nama" value="" >
							<span class="error text-red nama"></span>
		                </div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
		                <div class="col-lg-4 col-xs-4 border-left">
							<label>Luas Pengaliran</label>
		                </div>
		                <div class="col-lg-6 col-xs-6 ">
							<input type="text" placeholder="0" class="form-control" name="luas" value="" >
							<span class="error text-red luas"></span>

		                </div>
		                <div class="col-lg-2 col-xs-2 ">Km <sup>2</sup></div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
		                <div class="col-lg-4 col-xs-4 border-left">
							<label>Panjang Sungai</label>
		                </div>
		                <div class="col-lg-6 col-xs-6 ">
							<input type="text" placeholder="0" class="form-control" name="panjang" value="" >
							<span class="error text-red panjang"></span>

		                </div>
		                <div class="col-lg-2 col-xs-2 ">Km </div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
		                <div class="col-lg-4 col-xs-4 border-left">
							<label>Kemiringan Sungai</label>
		                </div>
		                <div class="col-lg-6 col-xs-6 ">
							<input type="text" placeholder="0" class="form-control" name="kemiringan" value="" >
							<span class="error text-red kemiringan"></span>

		                </div>
		                <div class="col-lg-2 col-xs-2 "></div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btnStore"><i class="icon-floppy-disk"></i> Simpan</button>
				<button type="button" class="btn btn-danger btn_closeedit" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready( function(e) {
            $(document).on('click', '.btn_closeedit', function(e) {
            	location.reload();
		});


	$(document).on('submit', '.form_edit', function(e) {
		$.ajax({
			type: "post",
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			beforeSend: function() {
				$('.btnStore').attr('disabled', 'disabled');
				$('.btnStore').html('<i class="fa fa-spin fa-spinner"></i> Sedang di Proses');
			},
			success: function(response) {
				$('.error').html('');
				if (response.status == false) {
					$.each(response.pesan, function(i, m) {
						$('.' + i).text(m);
					});
				} else {

		            	location.reload();

				}
			},
			complete: function() {
				$('.btnStore').removeAttr('disabled');
				$('.btnStore').html('<i class="icon-floppy-disk"></i> Simpan');
			}
		});
		return false;
	});
});
	
</script>
