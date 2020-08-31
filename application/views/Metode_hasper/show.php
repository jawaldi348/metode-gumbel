<script type="text/javascript">
	$(document).ready( function(e) {
	   	$(document).on('click', '.idgumbel', function(e) {
	   		$('.idlog_pearson_data').hide();
	   		$('.idgumbel_data').show();
		});
   	$(document).on('click', '.idlog_pearson', function(e) {
	   		$('.idgumbel_data').hide();
	   		$('.idlog_pearson_data').show();
	   		
		});
	});
	
</script>

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
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Data Rekapitulasi Perhitungan Curah Hujan</h3>
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
						<th class="text-center" width="80px">Hasper Action</th>

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
								<td class="text-center">
									<a href="#" class="idgumbel"><i class="ion-android-clipboard" data-toggle="tooltip" data-original-title="Lihat Hasil Perhitungan Dengan Metode Hasper "></i></a>
								</td>
					</tr>
					<tr>
						<td class="text-center">Log Pearson Type III</td>
						<?php
						foreach ($periode_log as $key_log => $value_log) {?>
							<td class="text-center">
								<?php
								$nilai = $ratalog+$value_log['value']*$standar_deviasai_log;
								echo format_koma(pow(10,$nilai));
								?>
							</td>
						<?php } ?>
						<td class="text-center">
									<a href="#" class="idlog_pearson" ><i class="ion-android-clipboard" data-toggle="tooltip" data-original-title="Lihat Hasil Perhitungan Dengan Metode Hasper"></i></a>
						</td>
					</tr>
				</table>
				<div class="row">
					<div class="col-xs-4"></div>
					<div class="col-xs-3">
						<?php include('datasungai.php'); ?>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
		</div>


	</div>
<div class="row idgumbel_data ">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Hasil Perhitungan Analisis Debit Banjir Dengan Metode Hasper Metode Pada Gumbel </h3>
				</div>
								<table class="table table-bordered table-striped">
					<tr>
						<th style="text-align: center;">T <br> (tahun)</th>
						<th style="text-align: center;">T <br> (jam)</th>
						<th style="text-align: center;">RT <br> (mm)</th>
						<th style="text-align: center;"> &beta; </th>
						<th style="text-align: center;"> A </th>
						<th style="text-align: center;"> Rt </th>
						<th style="text-align: center;"> qn </th>
						<th style="text-align: center;"> Q (m<sup>3</sup>/dtk) </th>
					</tr>
					<tr>
						<th style="text-align: center;"></th>
						<th style="text-align: center;">A </th>
						<th style="text-align: center;">b </th>
						<th style="text-align: center;">c </th>
						<th style="text-align: center;">d </th>
						<th style="text-align: center;">e </th>
						<th style="text-align: center;">f </th>
						<th style="text-align: center;">g </th>
					</tr>
					<tr>
						<th style="text-align: center;"></th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;">(axb) / (a+1) </th>
						<th style="text-align: center;">e / (3,6xa) </th>
						<th style="text-align: center;">c x d x 65,60 x f </th>
					</tr>
					<?php 
						$wkatukonsentrasi_t =0.1*(pow($data_sungai['panjang'],0.8))*(pow($data_sungai['kemiringan'],-0.3));

						$luaspengaliran_a=(1+(0.012*(pow($data_sungai['luas'],0.7)))) / (1+(0.075*(pow($data_sungai['luas'],0.7)))) ;


// ------------------------------MODEL 1------------------------------------------------
						
$V_n=(-0.4)*($wkatukonsentrasi_t);
$V_m=pow(10, $V_n);
$V_o=$wkatukonsentrasi_t+(3.7*$V_m);

//     /

$V_p=pow($wkatukonsentrasi_t, 2)+15; 

$V_q=$V_o / $V_p; //P2

$V_r=pow($data_sungai['luas'], (3/4)) / 12; //p3

$betaone=1+($V_q*$V_r);

// --------------------------------BETA 2-----------------------------------------

// $V_n=(-0.4)*($wkatukonsentrasi_t);
// $V_m=pow(10, $V_n);
// $V_o=$wkatukonsentrasi_t+(3.7*$V_m);


// $V_p=pow($wkatukonsentrasi_t, 2)+(15*12); 

// $V_q=($V_o*pow($data_sungai['luas'], (3/4))) / $V_p; //P2


// $betaone=1+($V_q);

// ------------------------------end-------------------------------------------




// $p3=((pow($data_sungai['luas'], (3/4))) / 12);
						// $beta=1+($c2);
						$i = 1;
						foreach ($gumbel_periode as $key_periode => $value_periode) {
							if ($i++ > 6) break; 
							$vr_RT=$rata + $standar_deviasai * (($value_periode - $yn) / $sn);
									

								// $nilai = $ratalog+$value_periode*$standar_deviasai_log;
									// $vr_RT=pow(10,$nilai);
$vr_A=$wkatukonsentrasi_t;
$vr_B=$vr_RT;
// $vr_C=0.145;
$vr_C=$betaone;
$vr_D=$luaspengaliran_a;

$vr_E=($vr_A*$vr_B)/ ($vr_A+1);

$vr_F=$vr_E/(3.6*$vr_A);
$vr_G=$vr_C*$vr_D*65.60*$vr_F;



					 ?>

					<tr>
						<th style="text-align: center;"><?= $key_periode ?></th>
						<th style="text-align: center;"><?= format_koma($wkatukonsentrasi_t);  ?></th>
						<th style="text-align: center;">
								<?php

								echo format_koma($vr_RT);
								?>
						</th>
						<th style="text-align: center;"><?= format_koma($betaone);  ?></th>
						<th style="text-align: center;"><?= format_koma($luaspengaliran_a); ?></th>
						<th style="text-align: center;"><?= format_koma($vr_E) ?></th>
						<th style="text-align: center;"><?= format_koma($vr_F) ?></th>
						<th style="text-align: center;"><?= $vr_G ?></th>
					</tr>
						<?php } ?>

				</table>
			</div>	
		</div>
</div>
<div class="row idlog_pearson_data">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Hasil Perhitungan Analisis Debit Banjir Dengan Metode Hasper Pada Metode Log Pearson</h3>
				</div>
				<table class="table table-bordered table-striped">
					<tr>
						<th style="text-align: center;">T <br> (tahun)</th>
						<th style="text-align: center;">T <br> (jam)</th>
						<th style="text-align: center;">RT <br> (mm)</th>
						<th style="text-align: center;"> &beta; </th>
						<th style="text-align: center;"> A </th>
						<th style="text-align: center;"> Rt </th>
						<th style="text-align: center;"> qn </th>
						<th style="text-align: center;"> Q (m<sup>3</sup>/dtk) </th>
					</tr>
					<tr>
						<th style="text-align: center;"></th>
						<th style="text-align: center;">A </th>
						<th style="text-align: center;">b </th>
						<th style="text-align: center;">c </th>
						<th style="text-align: center;">d </th>
						<th style="text-align: center;">e </th>
						<th style="text-align: center;">f </th>
						<th style="text-align: center;">g </th>
					</tr>
					<tr>
						<th style="text-align: center;"></th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;"> </th>
						<th style="text-align: center;">(axb) / (a+1) </th>
						<th style="text-align: center;">e / (3,6xa) </th>
						<th style="text-align: center;">c x d x 65,60 x f </th>
					</tr>
					<?php 
						$wkatukonsentrasi_t =0.1*(pow($data_sungai['panjang'],0.8))*(pow($data_sungai['kemiringan'],-0.3));

						$luaspengaliran_a=(1+(0.012*(pow($data_sungai['luas'],0.7)))) / (1+(0.075*(pow($data_sungai['luas'],0.7)))) ;


// ------------------------------MODEL 1------------------------------------------------
						
$V_n=(-0.4)*($wkatukonsentrasi_t);
$V_m=pow(10, $V_n);
$V_o=$wkatukonsentrasi_t+(3.7*$V_m);

//     /

$V_p=pow($wkatukonsentrasi_t, 2)+15; 

$V_q=$V_o / $V_p; //P2

$V_r=pow($data_sungai['luas'], (3/4)) / 12; //p3

$betaone=1+($V_q*$V_r);

// --------------------------------BETA 2-----------------------------------------

// $V_n=(-0.4)*($wkatukonsentrasi_t);
// $V_m=pow(10, $V_n);
// $V_o=$wkatukonsentrasi_t+(3.7*$V_m);


// $V_p=pow($wkatukonsentrasi_t, 2)+(15*12); 

// $V_q=($V_o*pow($data_sungai['luas'], (3/4))) / $V_p; //P2


// $betaone=1+($V_q);

// ------------------------------end-------------------------------------------




// $p3=((pow($data_sungai['luas'], (3/4))) / 12);
						// $beta=1+($c2);
						foreach ($periode_log as $key_log => $value_log) {
								$nilai = $ratalog+$value_log['value']*$standar_deviasai_log;
									$vr_RT=pow(10,$nilai);
$vr_A=$wkatukonsentrasi_t;
$vr_B=$vr_RT;
// $vr_C=0.145;
$vr_C=$betaone;
$vr_D=$luaspengaliran_a;

$vr_E=($vr_A*$vr_B)/ ($vr_A+1);

$vr_F=$vr_E/(3.6*$vr_A);
$vr_G=$vr_C*$vr_D*65.60*$vr_F;



					 ?>

					<tr>
						<th style="text-align: center;"><?= $value_log['key'] ?></th>
						<th style="text-align: center;"><?= format_koma($wkatukonsentrasi_t);  ?></th>
						<th style="text-align: center;">
								<?php

								echo format_koma($vr_RT);
								?>
						</th>
						<th style="text-align: center;"><?= format_koma($betaone);  ?></th>
						<th style="text-align: center;"><?= format_koma($luaspengaliran_a); ?></th>
						<th style="text-align: center;"><?= format_koma($vr_E) ?></th>
						<th style="text-align: center;"><?= format_koma($vr_F) ?></th>
						<th style="text-align: center;"><?= $vr_G ?></th>
					</tr>
						<?php } ?>

				</table>
			</div>	
		</div>
</div>
</div>
