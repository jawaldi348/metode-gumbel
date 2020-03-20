<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Curah_hujan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mstasiun');
	}
	public function index()
	{
		$data = [
			'title' => 'Curah Hujan',
			'small' => 'Menampilkan dan mengelola data curah hujan',
			'data'  => $this->Mstasiun->getAll(),
			'urls'  => '<li class="active">Curah Hujan</li>'
		];
		$this->template->display('curah_hujan/index', $data);
	}
	public function show($kode)
	{
		$data = [
			'title' => 'Curah Hujan',
			'small' => 'Menampilkan dan mengelola data curah hujan',
			'data'  => $this->Mstasiun->show($kode),
			'curah' => $this->Mstasiun->show_data($kode),
			'urls'  => '<li class="active">Curah Hujan</li>'
		];
		$this->template->display('curah_hujan/show', $data);
	}
}
