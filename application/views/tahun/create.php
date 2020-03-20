<div class="modal fade" id="modal_tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Tahun Curah Hujan</h4>
			</div>
			<?= form_open('tahun/store', ['class' => 'form_edit'], ['stasiun' => $data['id_stasiun']]) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>Stasiun</label>
					<input type="text" class="form-control" value="<?= $data['nama_stasiun'] ?>" readonly>
				</div>
				<div class="form-group">
					<label>Tahun</label>
					<input type="text" name="tahun" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Curah Hujan (mm)</label>
					<input type="text" name="curah" class="form-control" required>
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
