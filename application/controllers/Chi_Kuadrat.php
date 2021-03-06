<?php

class Chi_Kuadrat extends CI_Controller
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
			'small' => 'Metode Chi Kuadrat',
			'urls'  => '<li class="active">Metode Chi Kuadrat</li>',
			'data'  => $this->Mstasiun->getAll()
		];
		$this->template->display('Chi_Kuadrat/index', $data);
	}
	public function show($kode)
	{
		$data = [
			'title' => 'Metode Chi Kuadrat',
			'small' => 'Metode Chi Kuadrat',
			'urls'  => '<li class="active">Metode Chi Kuadrat</li>',
			'data'  => $this->Mstasiun->show($kode),
			'method' => $this->Mgumbel->show($kode),
			'periode' => $this->Mgumbel->reduced_variated(),
			'hubungan' => $this->Mgumbel->reduced_mean_standard_deviation()
		];
		$this->template->display('Chi_Kuadrat/show', $data);
	}
}
