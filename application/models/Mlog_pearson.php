<?php
class Mlog_pearson extends CI_Model
{
	public function reduced_variated()
	{
		$array = array(
			'2' => -0.018,
			'5' => 0.835,
			'10' => 1.293,
			'25' => 1.788,
			'50' => 2.112,
			'100' => 2.406
		);
		return $array;
	}
}
