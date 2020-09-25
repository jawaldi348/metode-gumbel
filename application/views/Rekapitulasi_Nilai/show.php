<!-- -----------------------Chi-Kuadrat -->
  <!-- Select2 -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css">
<script src="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
		let edit=(val)=>{
		// alert(val);
                 $.ajax({
                      type: "post",
                      url: "<?= site_url('Rekapitulasi_Nilai/edit') ?>",
					  data: "&kode=" + val,
                      cache: false,
                      success: function(response) {
                        $('.tampil_modal').html(response);
                        $('#modal_edit').modal('show');
                      }
                    });
	}
	$(document).ready(function() {
		
	// $('.alpha').select2();
	$('.metode_btn').click(function() {
			$('.show_gumbel').removeClass('hidden');
			$('.show_log').addClass('hidden');
	});
		$('.metode_gumbel_btn').click(function() {
			$('.show_log').removeClass('hidden');
			$('.show_gumbel').addClass('hidden');
	});




	// 	$('.alpha_value_btn').click(function() {
	// 		$('.alpha').removedClass('hidden');
	// 		$('.alpha_value').addClass('hidden');
	// 	});
	// 	$('.alpha').change(function() {
	// 		$('.alpha_value').removedClass('hidden');
	// 		$('.alpha').addClass('hidden');
	// 	});
	});

</script>
<div class="hidden">
	<?php include ('Chie-Kuadrat/show.php'); ?>
</div>
<div class="tampil_modal" ></div>
<div class="row">
		<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Rekapitulasi Nilai X2 & X2cr untuk Gumbel</h3>
			</div>
			<dir class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th >Distribusi Probabilitas</th>
						<th >X^2</th>
						<th >X^2cr</th>
						<th >Keterangan</th>
					</tr>
					<?php foreach ($rek_nilai as $d) {
						# code...?>
					<tr>
						<td><?= $d['id_prob'] ?></td>
						<td><?= format_koma($reselut); ?></td>
						<td><?= $d['X2cr'] ?>
							
							<a href="#" onclick="edit('<?= $d['id_prob'] ?>')"><i class="fa fa-edit" data-toggle="tooltip" data-original-title="Uba Nilai X^2cr"></i></a>
						</td>
						<td><?php if($reselut<$d['X2cr']){
								echo "Diterima";
										} else{
								echo "Tidak Diterima";

										}
						?></td>
					</tr>
					<?php	} ?>
					
				</table>
			</dir>
		</div>
	</div>
</div>





