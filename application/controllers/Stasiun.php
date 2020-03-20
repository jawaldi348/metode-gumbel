<?php

class Stasiun extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mstasiun');
	}
	public function create()
	{
		$this->load->view('stasiun/create');
	}
	public function store()
	{
		$param = $this->input->post(null, TRUE);
		$this->Mstasiun->store($param);
		$this->session->set_flashdata('pesan', sukses('Anda telah menambahkan data stasiun.'));
		redirect('curah-hujan');
	}
	public function edit()
	{
		$kode = $this->input->post('kode');
		$d['data'] = $this->Mstasiun->show($kode);
		$this->load->view('stasiun/edit', $d);
	}
	public function update()
	{
		$param = $this->input->post(null, TRUE);
		$this->Mstasiun->update($param);
		$this->session->set_flashdata('pesan', sukses('Anda telah mengubah data stasiun.'));
		redirect('curah-hujan');
	}
	public function destroy($kode)
	{
		if (!$this->Mstasiun->destroy($kode)) {
			$this->session->set_flashdata('pesan', danger('Anda tidak bisa menghapus data stasiun.'));
		} else {
			$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data stasiun.'));
		}
		redirect('curah-hujan');
	}
}
