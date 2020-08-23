<?php
$jml_data = count($gumbel);
$total = 0;
$pangkat2 = 0;
$pangkat3 = 0;
foreach ($gumbel as $row) {
	$total = $total + $row['jumlah_curah'];
}
$rata  = $total / count($gumbel);
foreach ($gumbel as $g) {
	$pangkat2 = $pangkat2 + pow($g['jumlah_curah'] - $rata, 2);
	$pangkat3 = $pangkat3 + pow($g['jumlah_curah'] - $rata, 3);
};
$standar_deviasai = sqrt($pangkat2 / ($jml_data - 1));
foreach ($gumbel_hubungan as $key_hubungan => $value_hubungan) {
	if ($jml_data == $key_hubungan) {
		$sn = $value_hubungan['sn'];
		$yn = $value_hubungan['yn'];
	}
}
?>

<?php
$total_log = 0;
$log_log = 0;
$pangkat1_log = 0;
$pangkat2_log = 0;
$pangkat3_log = 0;
foreach ($log_pearson as $row_log) {
	$total_log = $total_log + $row_log['jumlah_curah'];
	$log_log = $log_log + log10($row_log['jumlah_curah']);
}
$rata_log  = $total_log / count($log_pearson);
$ratalog = $log_log / count($log_pearson);
foreach ($log_pearson as $lp) {
	$pangkat1_log = $pangkat1_log + (log10($lp['jumlah_curah'])-$ratalog);
	$pangkat2_log = $pangkat2_log + (pow(log10($lp['jumlah_curah'])-$ratalog, 2));
	$pangkat3_log = $pangkat3_log + (pow(log10($lp['jumlah_curah'])-$ratalog, 3));
}
$standar_deviasai_log = sqrt($pangkat2_log / (count($log_pearson) - 1)); ?>
<div class="row">
	<div class="col-xs-7">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Rekapitulasi Perhitungan Curah Hujan</h3>
			</div>
				<table class="table table-bordered table-striped">
					<tr>
						<th class="text-center">Metode</th>
						<th class="text-center">R<sub>2</sub>(mm)</th>
						<th class="text-center">R<sub>5</sub>(mm)</th>
						<th class="text-center">R<sub>10</sub>(mm)</th>
						<th class="text-center">R<sub>25</sub>(mm)</th>
						<th class="text-center">R<sub>50</sub>(mm)</th>
						<th class="text-center">R<sub>100</sub>(mm)</th>
					</tr>
					<tr>
						<td class="text-center">Gumbel</td>
						<?php
						$i = 1;
						foreach ($gumbel_periode as $key_periode => $value_periode) {
							if ($i++ > 6) break; ?>
							<td class="text-center">
								<?= format_koma($rata + $standar_deviasai * (($value_periode - $yn) / $sn)) ?>
							</td>
						<?php } ?>
					</tr>
					<tr>
						<td class="text-center">Log Pearson Type III</td>
						<?php
						foreach ($periode_log as $key_log => $value_log) {?>
							<td class="text-center">
								<?php
								$nilai = $ratalog+$value_log*$standar_deviasai_log;
								echo format_koma(pow(10,$nilai));
								?>
							</td>
						<?php } ?>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
