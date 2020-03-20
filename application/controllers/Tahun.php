<?php

class Tahun extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mstasiun');
		$this->load->model('Mtahun');
	}
	public function create()
	{
		$kode = $this->input->post('kode');
		$d['data'] = $this->Mstasiun->show($kode);
		$this->load->view('tahun/create', $d);
	}
	public function store()
	{
		$param = $this->input->post(null, TRUE);
		$this->Mtahun->store($param);
		$this->session->set_flashdata('pesan', sukses('Anda telah menambahkan data tahun curah hujan.'));
		redirect('curah-hujan/show/' . $param['stasiun']);
	}
	public function edit()
	{
		$kode = $this->input->post('kode');
		$d['data'] = $this->Mtahun->shows($kode);
		$this->load->view('tahun/edit', $d);
	}
	public function update()
	{
		$param = $this->input->post(null, TRUE);
		$kode = $param['kode'];
		$this->Mtahun->update($param);
		$data = $this->Mtahun->shows($kode);
		$this->session->set_flashdata('pesan', sukses('Anda telah mengubah data tahun curah hujan.'));
		redirect('curah-hujan/show/' . $data['stasiun_curah']);
	}
	public function destroy($kode)
	{
		$data = $this->Mtahun->shows($kode);
		$this->Mtahun->destroy($kode);
		$this->session->set_flashdata('pesan', sukses('Anda telah menghapus data tahun curah hujan.'));
		redirect('curah-hujan/show/' . $data['stasiun_curah']);
	}
}
