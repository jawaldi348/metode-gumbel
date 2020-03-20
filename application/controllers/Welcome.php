<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'small' => title(),
			'urls'  => ''
		];
		$this->template->display('layout/content', $data);
	}
}
