<?php
class Msungai extends CI_Model
{
	public $tabel = 'sungai';
	public function shows()
	{

		return $this->db->query("SELECT*FROM ".$this->tabel)->row_array();
	}
	// public function store($param)
	// {
	// 	$data = [
	// 		'stasiun_curah' => $param['stasiun'],
	// 		'tahun_curah'   => $param['tahun'],
	// 		'jumlah_curah'  => $param['curah']
	// 	];
	// 	return $this->db->insert($this->tabel, $data);
	// }
	public function update($param)
	{
		$kode = '1';
		$data = [
			'nama'   => $param['nama'],
			'luas'  => $param['luas'],
			'panjang'  => $param['panjang'],
			'kemiringan'  => $param['kemiringan']
		];
		return $this->db->where('id', $kode)->update($this->tabel, $data);
	}

}
