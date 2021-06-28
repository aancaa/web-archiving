<?php namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Homepage'
		];
		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

}
