<div class="modal fade" id="modal_tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Stasiun</h4>
			</div>
			<?= form_open('stasiun/store', ['class' => 'form_create']) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Stasiun</label>
					<input type="text" name="nama" class="form-control" placeholder="Nama Stasiun">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btnStore"><i class="icon-floppy-disk"></i> Simpan</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
