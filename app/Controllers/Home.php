<?php namespace App\Controllers;
use App\Models\DisposisiSuratModel;
class Home extends BaseController
{
	protected $suratModel;
	public function __construct()
	{
		$this->suratModel = new DisposisiSuratModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Homepage',
			
		];
		return view('home/index', $data);
	}
	public function login()
	{
		$data = [
			'title' => 'Homepage'
		];
		return view('auth/login', $data);
	}
	public function register()
	{
		
		return view('auth/register');
	}

	
	public function laporansm()
	{
		$curentPage = $this->request->getVar('page_disposisi_sm') ? $this->request->getVar('page_disposisi_sm') : 1;
		$data = [
			'title' => 'Laporan Surat Masuk',
			'surat' => $this->suratModel->getSurat(),
			'surat' => $this->suratModel->paginate(6, 'disposisi_sm'),
			'pager' => $this->suratModel->pager,
			'currentPage' => $curentPage
		];
		return view('laporan/suratmasuk', $data);
	}
	
	
}

