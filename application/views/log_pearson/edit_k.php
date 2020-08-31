<script type="text/javascript">
$(document).ready( function(e) {
	$(document).on('click', '.btnStore', function(e) {
		val="<?= $data['key'] ?>"
                 $.ajax({
                      type: "post",
                      url: "<?= site_url('Log_pearson/update') ?>",
					  data: "&kode=" + val+"&value=" + $('.value').val(),
                      cache: false,
                      success: function(response) {
                      	location.reload();
                      }
                    });
	});
});
</script>
<div class="modal fade" id="modal_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Ubah Niali K Pada Formula</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-striped">
					<tr>
						<td style="vertical-align: center; text-align: center;" width="50%">
							Log Xt (Tahun) 
						</td>
						<td style="vertical-align: center; text-align: center;" >
							K
						</td>
					</tr>
					<tr>
						<td  style="vertical-align: center; text-align: center;" >
							<div class="form-group">
								<label><?= $data['key']  ?> </label>
							</div>
						</td>
						<td style="vertical-align: center; text-align: center;" 	>
							<div class="form-group">
								<input  style="border-radius: 20px;text-align: center;" type="text" class="form-control value" value="<?= $data['value'] ?>" >
							</div>
						</td>
					</tr>
				</table>


				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btnStore"><i class="icon-floppy-disk"></i> Simpan</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
			</div>
		</div>
	</div>
</div>
