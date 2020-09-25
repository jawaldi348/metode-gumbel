<div class="row">
		<div class="col-xs-3">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Metode Chi-Kuadrat <a href="#" class="btn metode_gumbel_btn"> (Gumbel)</a>
				</h3>
				<div class="pull-right">
					<h3 class="box-title"><?= $data['nama_stasiun'] ?></h3>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th class="text-center" width="80px">No.</th>
							<th class="text-right">Xi</th>
							
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
							</tr>
						<?php $no++;
						} ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Jumlah</th>
							<th class="text-right"><?= format_koma($total) ?></th>
							
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
		<div class="col-xs-3">
					<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Kelas Distribusi
				</h3>
				<div class="pull-right">
					<h3 class="box-title"><?= $data['nama_stasiun'] ?></h3>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped" >
					<tbody>
						<tr>
							<th class="text-center" width="100px"></th>
							<th class="text-right"></th>
						</tr>

							<tr style="background-color:#d2d6de; ">
								<td class="text-center">Kelas Distribusi (K)</td>
								<td class="text-left">
									<i>
									 K = 1+3,3 Log n<br>
									  &nbsp;&nbsp;&nbsp;&nbsp;= 1+3,3 Log 10<br>
									  &nbsp;&nbsp;&nbsp;&nbsp;= <b>4</b>
									<i>
									</td>
							</tr>
							<tr style="background-color:#d2d6de; ">
								<td class="text-center">Nilai Ef</td>
								<td class="text-left">
									<i>
									 Ef = n / k <br>
									  &nbsp;&nbsp;&nbsp;&nbsp;= 10 / 4<br>
									  &nbsp;&nbsp;&nbsp;&nbsp;= <b>2,5</b>
									<i>
									</td>
							</tr>
							<tr style="background-color:#d2d6de; ">
								<td class="text-center">Derajat Kebebasan (Dk)</td>
								<td class="text-left">
									<i>
									 Dk = K - R - 1 <br>
									  &nbsp;&nbsp;&nbsp;&nbsp;= 4 - 1 - 1<br>
									  &nbsp;&nbsp;&nbsp;&nbsp;= <b>2</b>
									<i>
									</td>
							</tr>
							<tr style="background-color:#d2d6de; ">
								<td class="text-center">&alpha; =</td>
								<td class="text-left">
	<!-- 								<i class="alpha_value ">
										data alpha
									<a href="#" onclick="edit('<?= $p['key'] ?>')">
										<i class="fa fa-gear alpha_value_btn" data-toggle="tooltip" data-original-title="Ubah Nilai &alpha; "></i></a>
									</i>
										 -->
						              <div class="form-group">
											<select style="width: 50%;" class="form-control  alpha">
												<?php 
												for($i=0;$i<100;$i++) {
												 ?>
												}
												<option value="<?= ($i / 100)  ?>"> <?= $i ?>&nbsp;%</option>
												<?php } ?>				
											</select>
						              </div>
									</td>
							</tr>
	
					</tbody>
					<tfoot>
					</tfoot>
				</table>
			</div>
		</div>
		</div>
		<?php 
		$DeltaX=($Xmax - $Xmin ) / (4-1);
		$Xawal=$Xmin - ((1/2)*($DeltaX)); 
		 ?>
		<div class="col-xs-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Perhitungan Uji Chi Kuadrat Gumbel</h3>
			</div>
			<dir class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th >No.</th>
						<th >Nilai Batasan</th>
						<th >Ef</th>
						<th >Of</th>
						<th >Ef-Of</th>
						<th >(Ef-Of)^2/Ef</th>
					</tr>
					<tr>
						<td>1.</td>
						<td>
							<?php $Batas_Max=($DeltaX+$Xawal); ?>
						<?= format_koma($Xawal) ?> &ge; X &le; <?= format_koma($Batas_Max) ?>  
						</td>
						<td>2,5</td>
						<td><?php
							$X_Of=0;
							for($n=1;$n<11;$n++){
								if($CHI[$n]<=$Batas_Max){
									$X_Of+=1;
								
								}}
								echo $X_Of;
								 $X_Of_Before=$X_Of;
						 ?></td>
						<td><?= format_koma(2.5-$X_Of) ?></td>
						<td><?php
						 $reselut=0;
						 echo $reselut+=(pow((2.5-$X_Of), 2)) / (2.5) ?></td>
					</tr>
					<tr>
						<td>2.</td>
						<td>
							<?php $Xawal=$Batas_Max; ?>
							<?php $Batas_Max=($Batas_Max+$DeltaX); ?>
						<?= format_koma($Xawal) ?> &ge; X &le; <?= format_koma($Batas_Max) ?>  
						</td>
						<td>2,5</td>
						<td><?php
							$X_Of=0;
							for($n=1;$n<11;$n++){
								if($CHI[$n]<=$Batas_Max){
									$X_Of+=1;
								
								}}
								
								$X_Of-=$X_Of_Before;
								echo $X_Of;
								$X_Of_Before+=$X_Of;
						 ?></td>
						<td><?= format_koma(2.5-$X_Of) ?></td>
						<td><?php
						  echo (pow((2.5-$X_Of), 2)) / (2.5);
						  $reselut+=(pow((2.5-$X_Of), 2)) / (2.5) ?></td>
					</tr>
					<tr>
						<td>3.</td>
						<td>
							<?php $Xawal=$Batas_Max; ?>
							<?php $Batas_Max=($Batas_Max+$DeltaX); ?>
						<?= format_koma($Xawal) ?> &ge; X &le; <?= format_koma($Batas_Max) ?>  
						</td>
						<td>2,5</td>
						<td><?php
							$X_Of=0;
							for($n=1;$n<11;$n++){
								if($CHI[$n]<=$Batas_Max){
									$X_Of+=1;
								
								}}
								
								$X_Of-=$X_Of_Before;
								echo $X_Of;
								$X_Of_Before+=$X_Of;
						 ?></td>
						<td><?= format_koma(2.5-$X_Of) ?></td>
						<td>
						<?php
						  echo (pow((2.5-$X_Of), 2)) / (2.5);
						  $reselut+=(pow((2.5-$X_Of), 2)) / (2.5) ?>
						</td>
					</tr>
					<tr>
						<td>4.</td>
						<td>
							<?php $Xawal=$Batas_Max; ?>
							<?php $Batas_Max=($Batas_Max+$DeltaX); ?>
						 X &le; <?= format_koma($Batas_Max) ?>  
						</td>
						<td>2,5</td>
						<td><?php
							$X_Of=0;
							for($n=1;$n<11;$n++){
								if($CHI[$n]<=$Batas_Max){
									$X_Of+=1;
								
								}}
								
								$X_Of-=$X_Of_Before;
								echo $X_Of;
								$X_Of_Before+=$X_Of;
						 ?></td>
						<td><?= format_koma(2.5-$X_Of) ?></td>
						<td>						<?php
						  echo (pow((2.5-$X_Of), 2)) / (2.5);
						  $reselut+=(pow((2.5-$X_Of), 2)) / (2.5) ?></td>
					</tr>
					<footer>
						<td></td>
						<td></td>
						<td>10</td>
						<td><?= $X_Of_Before ?></td>
						<td></td>
						<td><?= $reselut; ?></td>
					</footer>
				</table>
				
			</dir>
		</div>
	</div>
</div>