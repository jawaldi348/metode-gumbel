<?php

class Rekapitulasi_Nilai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mstasiun');
		$this->load->model('Mgumbel');
	}
	public function index()
	{
		$data = [
			'title' => 'Perhitungan Uji',
			'small' => 'Rekapitulasi Nilai ',
			'urls'  => '<li class="active">Rekapitulasi Nilai</li>',
			'data'  => $this->Mstasiun->getAll()
		];
		$this->template->display('Rekapitulasi_Nilai/index', $data);
	}
	public function show($kode)
	{
		$data = [
			'title' => 'Rekapitulasi Nilai ',
			'small' => 'Rekapitulasi Nilai ',
			'urls'  => '<li class="active">Rekapitulasi Nilai</li>',
			'data'  => $this->Mstasiun->show($kode),
			'method' => $this->Mgumbel->show($kode),
			'periode' => $this->Mgumbel->reduced_variated(),
			'hubungan' => $this->Mgumbel->reduced_mean_standard_deviation()
		];
		$this->template->display('Rekapitulasi_Nilai/show', $data);
	}
}
