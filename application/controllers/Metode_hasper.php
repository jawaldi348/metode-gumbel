<?php

class Metode_hasper extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mstasiun');
		$this->load->model('Mgumbel');
		$this->load->model('Mlog_pearson');
		$this->load->model('Msungai');
	}
	public function index()
	{
		$data = [
			'title' => 'Metode Hasper',
			'small' => 'Ananlisis Debit Banjir Rencana',
			'urls'  => '<li class="active">Metode Hasper</li>',
			'data'  => $this->Mstasiun->getAll()
		];
		$this->template->display('Metode_hasper/index', $data);
	}
		public function show($kode)
	{
		$data = [
			'title' => 'Perhitungan Dengan Metode Hasper',
			'small' => 'Ananlisis Debit Banjir Rencana',
			'urls'  => '<li class="active">Rekapitulasi Perhitungan</li>',
			'data'  => $this->Mstasiun->show($kode),
			'data_sungai' => $this->Msungai->shows(), 
			'gumbel' => $this->Mgumbel->show($kode),
			'gumbel_hubungan' => $this->Mgumbel->reduced_mean_standard_deviation(),
			'gumbel_periode' => $this->Mgumbel->reduced_variated(),
			'log_pearson' => $this->Mgumbel->show($kode),
			'periode_log' => $this->Mlog_pearson->reduced_variated(),
		];
		$this->template->display('Metode_hasper/show', $data);
	}
}
