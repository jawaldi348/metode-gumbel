<?php
class Mtahun extends CI_Model
{
	public $tabel = 'curah_hujan';
	public function shows($kode)
	{
		$this->db->from($this->tabel);
		$this->db->join('stasiun', 'id_stasiun=stasiun_curah');
		$this->db->where('id_curah', $kode);
		return $this->db->get()->row_array();
	}
	public function store($param)
	{
		$data = [
			'stasiun_curah' => $param['stasiun'],
			'tahun_curah'   => $param['tahun'],
			'jumlah_curah'  => $param['curah']
		];
		return $this->db->insert($this->tabel, $data);
	}
	public function update($param)
	{
		$kode = $param['kode'];
		$data = [
			'tahun_curah'   => $param['tahun'],
			'jumlah_curah'  => $param['curah']
		];
		return $this->db->where('id_curah', $kode)->update($this->tabel, $data);
	}
	public function destroy($kode)
	{
		$this->db->where('id_curah', $kode);
		$this->db->delete($this->tabel);
	}
}
