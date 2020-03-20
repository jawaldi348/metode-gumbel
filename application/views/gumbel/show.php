<div class="row">
	<!-- <div class="col-xs-3">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Stasiun : <?= $data['nama_stasiun'] ?></h3>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th class="text-center" width="40px">No.</th>
							<th class="text-center" width="50px">Tahun</th>
							<th class="text-center" width="110px">Curah Hujan</th>
						</tr>
						<?php $no = 1;
						$id = $data['id_stasiun'];
						$curah = $this->db->where('stasiun_curah', $id)->get('curah_hujan')->result_array();
						foreach ($curah as $c) { ?>
							<tr>
								<td class="text-center"><?= $no . '.' ?></td>
								<td class="text-center"><?= $c['tahun_curah'] ?></td>
								<td class="text-center"><?= number_format($c['jumlah_curah'], 4) ?></td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> -->
	<div class="col-xs-5">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Perhitungan Curah Hujan Metode Gumbel</h3>
				<div class="pull-right">
					<h3 class="box-title"><?= $data['nama_stasiun'] ?></h3>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th class="text-center" width="80px">No.</th>
							<th class="text-right">Curah Hujan</th>
							<th class="text-right">(Xi- X&#772;)</th>
							<th class="text-right">(Xi- X&#772;)<sup>2</sup></th>
							<th class="text-right">(Xi- X&#772;)<sup>3</sup></th>
						</tr>
						<?php
						$jml_data = count($method);
						$no = 1;
						$total = 0;
						$pangkat2 = 0;
						$pangkat3 = 0;
						foreach ($method as $row) {
							$total = $total + $row['jumlah_curah'];
						}
						$rata  = $total / count($method);
						foreach ($method as $m) {
							$pangkat2 = $pangkat2 + pow($m['jumlah_curah'] - $rata, 2);
							$pangkat3 = $pangkat3 + pow($m['jumlah_curah'] - $rata, 3);
						?>
							<tr>
								<td class="text-center"><?= $no . '.' ?></td>
								<td class="text-right"><?= format_koma($m['jumlah_curah']) ?></td>
								<td class="text-right"><?= format_koma($m['jumlah_curah'] - $rata) ?></td>
								<td class="text-right"><?= format_koma(pow($m['jumlah_curah'] - $rata, 2)) ?></td>
								<td class="text-right"><?= format_koma(pow($m['jumlah_curah'] - $rata, 3)) ?></td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Jumlah</th>
							<th class="text-right"><?= format_koma($total) ?></th>
							<th></th>
							<th class="text-right"><?= format_koma($pangkat2) ?></th>
							<th class="text-right"><?= format_koma($pangkat3) ?></th>
						</tr>
						<tr>
							<th>Rata-rata</th>
							<th class="text-right"><?= format_koma($rata) ?></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th colspan="3">Standar Deviasi</th>
							<?php $standar_deviasai = sqrt($pangkat2 / ($jml_data - 1)) ?>
							<th class="text-right"><?= format_koma($standar_deviasai) ?></th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xs-7">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Rekapitulasi Curah Hujan Metode Gumbel</h3>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th colspan="3">Hubungan <i>Reduced Mean</i> Yn dan <i>Reduced Standard Deviation</i> Yn</th>
					</tr>
					<tr>
						<th class="text-center">n</th>
						<th class="text-center">Sn</th>
						<th class="text-center">Yn</th>
					</tr>
					<tr>
						<td class="text-center"><?= $jml_data ?></td>
						<?php foreach ($hubungan as $key => $value) {
							if ($jml_data == $key) {
								echo '<td class="text-center">' . $value['sn'] . '</td>';
								echo '<td class="text-center">' . $value['yn'] . '</td>';
								$sn = $value['sn'];
								$yn = $value['yn'];
							}
						} ?>
					</tr>
				</table>
				<table class="table table-bordered table-striped">
					<tr>
						<th colspan="3">Rekapitulasi Curah Hujan Metode Gumbel</th>
					</tr>
					<tr>
						<th class="text-center" width="150px">Periode (Tahun)</th>
						<th class="text-center">Reduced Variated (Yt)</th>
						<th class="text-center">mm/hari</th>
					</tr>
					<?php
					$i = 1;
					foreach ($periode as $key => $value) {
						if ($i++ > 6) break; ?>
						<tr>
							<td class="text-center"><?= $key ?></td>
							<td class="text-center"><?= $value ?></td>
							<td class="text-center">
								<?= format_koma($rata + $standar_deviasai * (($value - $yn) / $sn)) ?>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
