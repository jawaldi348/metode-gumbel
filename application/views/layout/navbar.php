<?php $urls = $this->uri->segment(1) ?>
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav">
		<li class="<?= $urls == "welcome" ? "active" : null ?>"><a href="<?= site_url('welcome') ?>"><i class="icon-home4"></i> Home</a></li>
		<li class="<?= $urls == "curah-hujan" ? "active" : null ?>"><a href="<?= site_url('curah-hujan') ?>"><i class="icon-weather"></i> Data Curah Hujan</a></li>
		<li class="dropdown <?= $urls == "metode-gumbel" || $urls == "log-pearson" || $urls == "rekapitulasi" ? "active" : null ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-weather"></i> Perhitungan Curah Hujan <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li class="<?= $urls == "metode-gumbel" ? "active" : null ?>">
					<a href="<?= site_url('metode-gumbel') ?>">Metode Gumbel</a>
				</li>
				<li class="<?= $urls == "log-pearson" ? "active" : null ?>">
					<a href="<?= site_url('log-pearson') ?>">Metode Distribusi Log Pearson Type III</a>
				</li>
				<li class="<?= $urls == "rekapitulasi" ? "active" : null ?>">
					<a href="<?= site_url('rekapitulasi') ?>">Rekapitulasi Perhitungan</a>
				</li>
			</ul>
		</li>
		<li class="<?= $urls == "uji-kesesuain" || $urls == "Chi-Kuadrat" ? "active" : null ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-contrast"></i> Uji Kesesuain <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li class="<?= $urls == "rekapitulasi" ? "active" : null ?>">
					<a href="<?= site_url('uji-kesesuain') ?>">Penentuan Jenis Distribusi</a>
				</li>
				<li class="<?= $urls == "Chi-Kuadrat" ? "active" : null ?>">
					<a href="<?= site_url('Chi-Kuadrat') ?>">Metode <i>Chi-Kuadrat</i></a>
				</li>
				<li class="<?= $urls == "Rekapitulasi-Nilai" ? "active" : null ?>">
					<a href="<?= site_url('Rekapitulasi-Nilai') ?>">Rekapitulasi Nilai X2 & X2cr untuk Gumbel</a>
				</li>
			</ul>
		</li>
		<li class="<?= $urls == "Metode-Hasper" || $urls == "Chi-Kuadrat" ? "active" : null ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-contrast"></i> Analisis Debit Banjir Rencana<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li class="<?= $urls == "Metode-Hasper" ? "active" : null ?>">
					<a href="<?= site_url('Metode-Hasper') ?>">Metode Hasper </a>
				</li>
			</ul>
		</li>
		
	</ul>

</div>
