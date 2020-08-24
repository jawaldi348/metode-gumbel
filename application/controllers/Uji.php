<?php

class Uji extends CI_Controller
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
			'title' => 'Uji Kesesuain',
			'small' => 'Penentuan Jenis Distribusi',
			'urls'  => '<li class="active">Uji Kesesuain</li>',
			'data'  => $this->Mstasiun->getAll()
		];
		$this->template->display('Uji/index', $data);
	}
	public function show($kode)
	{
		$data = [
			'title' => 'Uji Kesesuain',
			'small' => 'Penentuan Jenis Distribusi',
			'urls'  => '<li class="active">Uji Kesesuain</li>',
			'data'  => $this->Mstasiun->show($kode),
			'method' => $this->Mgumbel->show($kode),
			'periode' => $this->Mgumbel->reduced_variated(),
			'hubungan' => $this->Mgumbel->reduced_mean_standard_deviation()
		];
		$this->template->display('Uji/show', $data);
	}
}
