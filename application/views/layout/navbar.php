<?php $urls = $this->uri->segment(1) ?>
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav">
		<li class="<?= $urls == "welcome" ? "active" : null ?>"><a href="<?= site_url('welcome') ?>"><i class="icon-home4"></i> Home</a></li>
		<li class="<?= $urls == "curah-hujan" ? "active" : null ?>"><a href="<?= site_url('curah-hujan') ?>"><i class="icon-weather"></i> Data Curah Hujan</a></li>
		<li class="<?= $urls == "metode-gumbel" ? "active" : null ?>"><a href="<?= site_url('metode-gumbel') ?>"><i class="icon-weather"></i> Metode Gumbel</a></li>



		<!-- <li class="dropdown <?= $urls == "tahun-ajaran" ? "active" : null ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-stack2"></i> Master Data <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li class="<?= $urls == "tahun-ajaran" ? "active" : null ?>">
					<a href="<?= site_url('tahun-ajaran') ?>">Tahun Ajaran</a>
				</li>
			</ul>
		</li> -->
	</ul>
</div>
