<?php

class Rekapitulasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mstasiun');
		$this->load->model('Mgumbel');
		$this->load->model('Mlog_pearson');
	}
	public function index()
	{
		$data = [
			'title' => 'Rekapitulasi Perhitungan Curah Hujan',
			'small' => '',
			'urls'  => '<li class="active">Rekapitulasi Perhitungan</li>',
			'data'  => $this->Mstasiun->getAll()
		];
		$this->template->display('rekapitulasi/index', $data);
	}
	public function show($kode)
	{
		$data = [
			'title' => 'Rekapitulasi Perhitungan Curah Hujan',
			'small' => '',
			'urls'  => '<li class="active">Rekapitulasi Perhitungan</li>',
			'data'  => $this->Mstasiun->show($kode),
			'gumbel' => $this->Mgumbel->show($kode),
			'gumbel_hubungan' => $this->Mgumbel->reduced_mean_standard_deviation(),
			'gumbel_periode' => $this->Mgumbel->reduced_variated(),
			'log_pearson' => $this->Mgumbel->show($kode),
			'periode_log' => $this->Mlog_pearson->reduced_variated(),
		];
		$this->template->display('rekapitulasi/show', $data);
	}
}
