<?php
class Mgumbel extends CI_Model
{
	public function show($kode)
	{
		$this->db->where('stasiun_curah', $kode);
		$this->db->order_by('jumlah_curah', 'DESC');
		return $this->db->get('curah_hujan')->result_array();
	}
	public function reduced_variated()
	{
		$array = array(
			'2' => '0.3665',
			'5' => '1.4999',
			'10' => '2.2504',
			'25' => '3.1985',
			'50' => '3.9019',
			'100' => '4.6001',
			'200' => '5.2956',
			'500' => '6.2136',
			'1000' => '6.9072',
			'2000' => '7.6006',
			'5000' => '8.5170',
			'10000' => '9.2102',
			'20000' => '9.9034',
			'50000' => '10.8197',
			'100000' => '11.5129'
		);
		return $array;
	}
	public function reduced_mean_standard_deviation()
	{
		$array = array(
			'8' => array('yn' => '0.4843', 'sn' => '0.9043'),
			'9' => array('yn' => '0.4902', 'sn' => '0.9288'),
			'10' => array('yn' => '0.4952', 'sn' => '0.9496'),
			'11' => array('yn' => '0.4996', 'sn' => '0.9676'),
			'12' => array('yn' => '0.5035', 'sn' => '0.9833'),
			'13' => array('yn' => '0.5070', 'sn' => '0.9971')
		);
		return $array;
	}
}
