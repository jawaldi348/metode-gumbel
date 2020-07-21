<div class="row">
	<div class="col-xs-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Data Curah Hujan Stasiun "<?= $data['nama_stasiun']?>"</h3>
				<div class="box-tools">
					<a href="<?= site_url('curah-hujan') ?>" class="btn btn-danger btn-sm"><i class="fa fa-angle-double-left"></i> Kembali</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<?php echo $this->session->flashdata('pesan'); ?>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center" width="40px">No.</th>
							<th>Tahun</th>
							<th class="text-right">Curah Hujan (mm)</th>
							<th class="text-center" width="80px">
								<a href="javascript:void(0)" onclick="tambah('<?= $data['id_stasiun'] ?>')"><i class="icon-plus3 text-black" data-toggle="tooltip" data-original-title="Tambah Data"></i></a>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						$total = 0;
						foreach ($curah as $c) {
							$total = $total + $c['jumlah_curah'];
						?>
							<tr>
								<td class="text-center"><?= $no . '.' ?></td>
								<td><?= $c['tahun_curah'] ?></td>
								<td class="text-right"><?= format_koma($c['jumlah_curah']) ?></td>
								<td class="text-center">
									<a href="javascript:void(0)" onclick="edit('<?= $c['id_curah'] ?>')"><i class="icon-pencil7 text-green" data-toggle="tooltip" data-original-title="Edit Data"></i></a>
									<a href="<?php echo site_url('tahun/destroy/' . $c['id_curah']) ?>" onclick="return confirm('Yakin akan hapus data ini ?');"><i class="icon-trash text-red" data-toggle="tooltip" data-original-title="Hapus Data"></i></a>
								</td>
							</tr>
						<?php $no++;
						} ?>
						<tr>
							<th colspan="2">Total</th>
							<th class="text-right"><?= format_koma($total) ?></th>
							<th></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="tampil_modal"></div>
<script>
	function tambah(kode) {
		$.ajax({
			type: "post",
			url: "<?= site_url('tahun/create') ?>",
			data: "&kode=" + kode,
			cache: false,
			success: function(response) {
				$('#tampil_modal').html(response);
				$('#modal_tambah').modal('show');
			}
		});
	}

	function edit(kode) {
		$.ajax({
			type: "post",
			url: "<?= site_url('tahun/edit') ?>",
			data: "&kode=" + kode,
			cache: false,
			success: function(response) {
				$('#tampil_modal').html(response);
				$('#modal_edit').modal('show');
			}
		});
	}
</script>
