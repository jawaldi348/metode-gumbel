<!-- ------------------------------ tabel log person-------------------- -->

<div class="hidden">
	
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
							<?php $pangkat3_log=$pangkat3 ?>
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
								<?php $standar_deviasai_log=$standar_deviasai; ?>
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
</div>

<!--end ------------------------------ tabel log person-------------------- -->


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
	<div class="col-xs-5 hidden">
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
							<th class="text-right">(Xi- X&#772;)<sup>4</sup></th>
						</tr>
						<?php
						$jml_data = count($method);
						$no = 1;
						$log = 0;

						$total = 0;
						$pangkat2 = 0;
						$pangkat3 = 0;
						$pangkat4 = 0;
						foreach ($method as $row) {
							$total = $total + $row['jumlah_curah'];
							$log = $log + log10($row['jumlah_curah']);

						}
						$rata  = $total / count($method);
						$ratalog = $log / count($method);

						foreach ($method as $m) {
							$pangkat2 = $pangkat2 + pow($m['jumlah_curah'] - $rata, 2);
							$pangkat3 = $pangkat3 + pow($m['jumlah_curah'] - $rata, 3);
							$pangkat4= $pangkat4 + pow($m['jumlah_curah'] - $rata, 4);
						?>
							<tr>
								<td class="text-center"><?= $no . '.' ?></td>
								<td class="text-right"><?= format_koma($m['jumlah_curah']) ?></td>
								<td class="text-right"><?= format_koma($m['jumlah_curah'] - $rata) ?></td>
								<td class="text-right"><?= format_koma(pow($m['jumlah_curah'] - $rata, 2)) ?></td>
								<td class="text-right"><?= format_koma(pow($m['jumlah_curah'] - $rata, 3)) ?></td>
								<td class="text-right"><?= format_koma(pow($m['jumlah_curah'] - $rata, 4)) ?></td>
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
							<th class="text-right"><?= format_koma($pangkat4) ?></th>
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
<!-- 	<div class="col-xs-7">
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
	</div> -->
<?php 
// -----------------Gumbel---------------
$var_x=floatval ($pangkat3);
$var_n=floatval($jml_data);
$var_s3=pow($standar_deviasai, 3);
$var_cs=($var_x * $var_n) / ( ($var_n -1)*($var_n - 2) * $var_s3 ) ;
// -----------------End Gumbel---------------

// -------------- Gumbel-----------
$var_x=floatval ($pangkat4);
$var_n=floatval($jml_data);
$var_n2=pow(floatval($jml_data), 2);
$var_s4=pow($standar_deviasai, 4);
$var_ck=($var_x * $var_n2  ) / ( ($var_n -1)*($var_n - 2)*($var_n - 3) * $var_s4 ) ;

// -------------- Log Pearson Type III-----------
$var_cs_log=($var_n * round($pangkat3_log,3)) / ( ($var_n -1)*($var_n -2)* pow(round($standar_deviasai_log,3), 3) );
// echo "stringtess : ". 103 ;

 ?>
		<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">UJI KESESUAIAN</h3>
			</div>
			<div class="box-body table-responsive">
				
				<table class="table table-bordered table-striped">
					<tr>
						<th colspan="3">Hasil Rekapitulasi Penentuan Jenis Distribusi</th>
					</tr>
					<tr>
						<th class="text-center" width="150px">Jenis Distribusi</th>
						<th class="text-center">Perhitungan</th>
						<th class="text-center">&#x25B3</th>
						<th class="text-center">Syarat</th>
						<th class="text-center">Kesimpulan</th>
					</tr>
					<tr>
						<td class="text-center">Gumbel</td>
						<td class="text-center">
							Cs= <?=  format_koma(round($var_cs,4)) ?>
							<br>
							Ck= <?=  format_koma(round($var_ck,4)) ?>
						</td>
						<td class="text-center">

							<?= format_koma(1.1396 - round($var_cs,4))    ?>
							<br>
							<?= format_koma(5.4002  - round($var_ck,4))    ?>
						</td>
						<td class="text-center">
							Cs &le; 1,1396 
							<br>
							Ck &le; 5,4002 
						</td>
						<td class="text-center">
							<?= round($var_cs,4) <= 1.1396 ? "Diterima" : "Tidak Diterima" ?>
							<br>
							<?= round($var_ck,4) <= 5.4002 ? "Diterima" : "Tidak Diterima" ?>

						</td>
					</tr>
					<tr>
						<td class="text-center"><i>Log Pearson Type III</i></td>
						<td class="text-center">Cs= <?=  format_koma(round($var_cs_log,4)) ?></td>
						<td class="text-center">
							<?= format_koma( 0 - round($var_cs,4))    ?>
							
						</td>
						<td class="text-center">
							Cs &ne; 0 
						</td>
						<td class="text-center">
							<?= round($var_ck,4) !== 0 ? "Diterima" : "Tidak Diterima" ?>
							
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>



