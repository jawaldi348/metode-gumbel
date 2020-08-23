<div class="row">
	<div class="col-xs-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Perhitungan Curah Hujan Metode Distribusi Log Pearson Type 3</h3>
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
							<th class="text-right">log Xi</th>
							<th class="text-right">(logXi-logX)</th>
							<th class="text-right">(logXi-logX)<sup>2</sup></th>
							<th class="text-right">(logXi-logX)<sup>3</sup></th>
						</tr>
						<?php
						$no = 1;
						$total = 0;
						$log = 0;
						$pangkat1 = 0;
						$pangkat2 = 0;
						$pangkat3 = 0;
						foreach ($method as $row) {
							$total = $total + $row['jumlah_curah'];
							$log = $log + log10($row['jumlah_curah']);
						}
						$rata  = $total / count($method);
						$ratalog = $log / count($method);
						foreach ($method as $m) {
							$pangkat1 = $pangkat1 + (log10($m['jumlah_curah'])-$ratalog);
							$pangkat2 = $pangkat2 + (pow(log10($m['jumlah_curah'])-$ratalog, 2));
							$pangkat3 = $pangkat3 + (pow(log10($m['jumlah_curah'])-$ratalog, 3));
						?>
							<tr>
								<td class="text-center"><?= $no . '.' ?></td>
								<td class="text-right"><?= format_koma($m['jumlah_curah']) ?></td>
								<td class="text-right"><?= format_koma(log10($m['jumlah_curah'])) ?></td>
								<td class="text-right"><?= format_koma(log10($m['jumlah_curah'])-$ratalog) ?></td>
								<td class="text-right"><?= format_koma(pow(log10($m['jumlah_curah'])-$ratalog, 2)) ?></td>
								<td class="text-right"><?= format_koma(pow(log10($m['jumlah_curah'])-$ratalog, 3)) ?></td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Jumlah</th>
							<th class="text-right"><?= format_koma($total) ?></th>
							<th class="text-right"><?= format_koma($log) ?></th>
							<th class="text-right"><?= format_koma($pangkat1) ?></th>
							<th class="text-right"><?= format_koma($pangkat2) ?></th>
							<th class="text-right"><?= format_koma($pangkat3) ?></th>
						</tr>
						<tr>
							<th>Rata-rata</th>
							<th class="text-right"><?= format_koma($rata) ?></th>
							<th class="text-right"><?= format_koma($ratalog) ?></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th colspan="3">Standar Deviasi</th>
							<th></th>
							<th class="text-right">
								<?php $standar_deviasai = sqrt($pangkat2 / (count($method) - 1)) ?>
								<?= format_koma($standar_deviasai) ?>
							</th>
							<th></th>
						</tr>
						<tr>
							<th colspan="5">Koefisien Kemencengan (Skewness)</th>
							<th class="text-right">
								<?= format_koma((10*$pangkat3)/(count($method)-1)*(count($method)-2) * pow($standar_deviasai,3)) ?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Perhitungan curah hujan dengan periode ulang 2, 5, 10, 25, 50, 100 tahun</h3>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th colspan="7">Rekapitulasi Curah Hujan Metode Distribusi Log Pearson Type 3</th>
					</tr>
					<tr>
						<th class="text-center" width="40px">No</th>
						<th class="text-center">Log Xt<br>( Tahun )</th>
						<th class="text-center">Log Xi</th>
						<th class="text-center">K</th>
						<th class="text-center">sd</th>
						<th class="text-center">Log Xt</th>
						<th class="text-center">Xt</th>
					</tr>
					<?php
					$no=1;
					foreach ($periode as $key => $value) {?>
						<tr>
							<td class="text-center"><?= $no ?></td>
							<td class="text-center"><?= $key ?></td>
							<td class="text-center"><?= format_koma($ratalog) ?></td>
							<td class="text-center"><?= $value ?></td>
							<td class="text-center"><?= format_koma($standar_deviasai) ?></td>
							<td class="text-center"><?= format_koma($ratalog+$value*$standar_deviasai) ?></td>
							<td class="text-center">
								<?php
								$nilai = $ratalog+$value*$standar_deviasai;
								echo format_koma(pow(10,$nilai));
								?>
							</td>
						</tr>
					<?php $no++; } ?>
				</table>
				<?php 
    $x=1.9683;
    $logBase2 = pow(2,$x);
    $logBase10 = pow(10,$x);
    $logBasee = pow(1.9683,$x);
    // echo sprintf("Anti Log of 10 for base as 2 = %f",$logBase2);
    echo sprintf("\nAnti Log of 10 for base as 10 = %f",$logBase10);
    // echo sprintf("\nAnti Log of 10 for base as e = %f",$logBasee);
?>
			</div>
		</div>
	</div>
</div>