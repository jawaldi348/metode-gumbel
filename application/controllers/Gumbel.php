<?php

class Gumbel extends CI_Controller
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
			'title' => 'Metode Gumbel',
			'small' => 'Perhitungan Curah Hujan Dengan Metode Gumbel',
			'urls'  => '<li class="active">Metode Gumbel</li>',
			'data'  => $this->Mstasiun->getAll()
		];
		$this->template->display('gumbel/index', $data);
	}
	public function show($kode)
	{
		$data = [
			'title' => 'Metode Gumbel',
			'small' => 'Perhitungan Curah Hujan Dengan Metode Gumbel',
			'urls'  => '<li class="active">Metode Gumbel</li>',
			'data'  => $this->Mstasiun->show($kode),
			'method' => $this->Mgumbel->show($kode),
			'periode' => $this->Mgumbel->reduced_variated(),
			'hubungan' => $this->Mgumbel->reduced_mean_standard_deviation()
		];
		$this->template->display('gumbel/show', $data);
	}
}
