<div class="row">
	<div class="col-lg-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Data Stasiun</h3>
			</div>
			<div class="box-body table-responsive">
				<?php echo $this->session->flashdata('pesan'); ?>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center" width="40px">No.</th>
							<th>Nama Stasiun</th>
							<th class="text-center" width="80px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) { ?>
							<tr>
								<td class="text-center"><?= $no . '.' ?></td>
								<td><?= $d['nama_stasiun'] ?></td>
								<td class="text-center">
									<a href="<?= site_url('rekapitulasi/show/' . $d['id_stasiun']) ?>"><i class="icon-eye8 text-blue" data-toggle="tooltip" data-original-title="Hasil Metode Gumbel"></i></a>
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