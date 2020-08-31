<?php

class Sungai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mstasiun');
		$this->load->model('Mtahun');
		$this->load->model('Msungai');
	}

	public function edit()
	{
		$this->load->view('Sungai/edit');
	}
	public function update()
	{
			$this->form_validation->set_rules('nama', 'Nama Sungai', 'required');
			$this->form_validation->set_rules('panjang', 'Panjang Sungai', 'required');
			$this->form_validation->set_rules('kemiringan', 'Kemiringan Sungai', 'required');
			$this->form_validation->set_rules('luas', 'Luas Pengaliran', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong.');
			if ($this->form_validation->run() == TRUE) {
				$json['status'] = TRUE;
				
				$param = $this->input->post(null, TRUE);
				$this->Msungai->update($param);
				$this->session->set_flashdata('pesan', sukses('Data Guru berhasil tersimpan.'));
			} else {
				$json['status'] = false;
				$json['pesan']  = $this->form_validation->error_array();
			}
			echo json_encode($json);



	}
}
