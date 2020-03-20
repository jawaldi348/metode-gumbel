<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('theme')) {
	function theme()
	{
		$link = base_url() . 'assets/';
		return $link;
	}
}

if (!function_exists('title')) {
	function title()
	{
		return $value = 'Pantau Curah Hujan';
	}
}

if (!function_exists('user')) {
	function user()
	{
		return $value = 'Alexander Pierce';
	}
}

if (!function_exists('role')) {
	function role()
	{
		return $value = 'Web Developer';
	}
}

if (!function_exists('foto')) {
	function foto()
	{
		return $value = base_url() . 'assets/dist/img/user2-160x160.jpg';
	}
}

if (!function_exists('bergabung')) {
	function bergabung()
	{
		return $value = 'Member since Nov. 2012';
	}
}

if (!function_exists('format_koma')) {
	function format_koma($angka)
	{
		// return number_format($angka, 4);
		return number_format($angka, 4, ",", ".");
	}
}
