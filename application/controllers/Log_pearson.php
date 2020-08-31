<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_pearson extends CI_Controller
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
			'title' => 'Metode Distribusi Log Pearson Type III',
			'small' => 'Perhitungan Curah Hujan',
			'urls'  => '<li class="active">Metode Distribusi Log Pearson Type III</li>',
			'data'  => $this->Mstasiun->getAll()
		];
		$this->template->display('log_pearson/index', $data);
	}
	public function show($kode)
	{
		$data = [
			'title' => 'Metode Distribusi Log Pearson Type III',
			'small' => '',
			'urls'  => '<li class="active">Metode Distribusi Log Pearson Type III</li>',
			'data'  => $this->Mstasiun->show($kode),
			'method' => $this->Mgumbel->show($kode),
			'periode' => $this->Mlog_pearson->reduced_variated()
		];
		$this->template->display('log_pearson/show', $data);
	}
	public function edit()
	{
		$kode = $this->input->post('kode');
		$d['data'] = $this->Mlog_pearson->reduced_variated_Show($kode);
		$this->load->view('log_pearson/edit_k', $d);
	}
		public function update()
	{
		$param = $this->input->post(null, TRUE);
echo		$kode = $param['kode'];
echo		$kode = $param['value'];
		$this->Mlog_pearson->reduced_variated_Update($param);
		// $this->session->set_flashdata('pesan', sukses('Anda telah mengubah data tahun curah hujan.'));
	}
}
