<?php
class Mstasiun extends CI_Model
{
	public $tabel = 'stasiun';
	public function getAll()
	{
		return $this->db->get($this->tabel)->result_array();
	}
	public function show($kode)
	{
		return $this->db->where('id_stasiun', $kode)->get($this->tabel)->row_array();
	}
	public function show_data($kode)
	{
		return $this->db->where('stasiun_curah', $kode)->get('curah_hujan')->result_array();
	}
	public function store($param)
	{
		$data = [
			'nama_stasiun' => $param['nama']
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function update($param)
	{
		$data = [
			'nama_stasiun' => $param['nama']
		];
		return $this->db->where('id_stasiun', $param['kode'])->update($this->tabel, $data);
	}
	public function destroy($kode)
	{
		return $this->db->simple_query("DELETE FROM " . $this->tabel . " WHERE id_stasiun='$kode'");
	}
}
