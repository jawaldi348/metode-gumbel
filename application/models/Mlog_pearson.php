<?php
class Mlog_pearson extends CI_Model
{
	public function reduced_variated()
	{
		$array=$this->db->query("SELECT*FROM reduced_variated")->result_array();
		// $array = array(
		// 	'2' => -0.018,
		// 	'5' => 0.835,
		// 	'10' => 1.293,
		// 	'25' => 1.788,
		// 	'50' => 2.112,
		// 	'100' => 2.406
		// );
		return $array;

	}
	public function reduced_variated_Show($value)
	{
		$array=$this->db->query("SELECT*FROM reduced_variated WHERE reduced_variated.key='$value' ")->row_array();
		return $array;
	}
	public function reduced_variated_Update($param)
	{
		$kode = $param['kode'];
		$data = [
			'value'  => $param['value']
		];
		return $this->db->where('key', $kode)->update('reduced_variated',$data);
	}
}
