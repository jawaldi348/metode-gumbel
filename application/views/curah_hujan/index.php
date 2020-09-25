<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<button class="btn bg-olive tambah_stasiun"><i class="icon-plus3"></i> Tambah Stasiun</button>
			</div>
			<div class="box-body table-responsive">
				<?php echo $this->session->flashdata('pesan'); ?>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center" width="40px">No.</th>
							<th>Nama Stasiun</th>
							<th class="text-right">Total Curah Hujan (mm)</th>
							<th class="text-center" width="100px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) {
							$id = $d['id_stasiun'];
							$total = $this->db->query("SELECT SUM(jumlah_curah) as total FROM curah_hujan WHERE stasiun_curah='$id'")->row_array();
						?>
							<tr>
								<td class="text-center"><?= $no . '.' ?></td>
								<td><?= $d['nama_stasiun'] ?></td>
								<td class="text-right"><?= format_koma($total['total'])?></td>
								<td class="text-center">
									<a href="javascript:void(0)" onclick="edit('<?= $d['id_stasiun'] ?>')"><i class="icon-pencil7 text-green" data-toggle="tooltip" data-original-title="Edit Data"></i></a>
									<a href="<?php echo site_url('stasiun/destroy/' . $d['id_stasiun']) ?>" onclick="return confirm('Yakin akan hapus data ini ?');"><i class="icon-trash text-red" data-toggle="tooltip" data-original-title="Hapus Data"></i></a>
									<a href="<?= site_url('curah-hujan/show/' . $d['id_stasiun']) ?>"><i class="icon-eye8 text-blue" data-toggle="tooltip" data-original-title="Tambah Curah Hujan"></i></a>
								</td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="tampil_modal"></div>
<script>
	$(document).on('click', '.tambah_stasiun', function(e) {
		$.ajax({
			url: "<?= site_url('stasiun/create') ?>",
			success: function(data) {
				$('#tampil_modal').html(data);
				$('#modal_tambah').modal('show');
			}
		});
	});

	function edit(kode) {
		// alert(kode);
		$.ajax({
			type: "post",
			url: "<?= site_url('stasiun/edit') ?>",
			data: "&kode=" + kode,
			cache: false,
			success: function(response) {
				$('#tampil_modal').html(response);
				$('#modal_edit').modal('show');
			}
		});
	}
</script>
