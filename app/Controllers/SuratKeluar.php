<?php

namespace App\Controllers;

use App\Models\SuratKeluarModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SuratKeluar extends BaseController
{
	protected $suratModel;
	public function __construct()
	{
		$this->suratModel = new SuratKeluarModel();
	}


	public function printExcel()
	{
		$surat = new SuratKeluarModel();
		$dataSurat = $surat->findAll();

		$spreadsheet = new Spreadsheet();
		// tulis header/nama kolom 
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No. Surat')
			->setCellValue('B1', 'Penerima')
			->setCellValue('C1', 'Tanggal Surat Keluar')
			->setCellValue('D1', 'Prihal');
		$column = 2;
		// tulis data mobil ke cell
		foreach ($dataSurat as $data) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $column, $data['no_sk'])
				->setCellValue('B' . $column, $data['penerima'])
				->setCellValue('C' . $column, $data['tgl_sk'])
				->setCellValue('D' . $column, $data['ktr_sk']);
			$column++;
		}
		// tulis dalam format .xlsx
		$writer = new Xlsx($spreadsheet);
		$fileName = 'Data Surat Keluar';

		// Redirect hasil generate xlsx ke web client
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function laporansk()
	{
		$data = [
			'title' => 'laporan Surat Keluar',
			'surat' => $this->suratModel->getSurat(),
			'surat' => $this->suratModel->paginate(5, 'tbl_sk'),
			'pager' => $this->suratModel->pager
		];
		return view('laporan/suratkeluar', $data);
	}
	
	public function suratkeluar()
	{

		$data = [
			'title' => 'Surat Keluar',
			'surat' => $this->suratModel->getSurat(),
			'surat' => $this->suratModel->paginate(5, 'tbl_sk'),
			'pager' => $this->suratModel->pager
		];

		return view('suratkeluar/sk', $data);
	}


	public function detail($id)
	{
		$surat = $this->suratModel->getSurat($id);
		$data = [
			'title' => 'Detail Surat Keluar',
			'surat' => $surat
		];
		return view('suratkeluar/detail_sk', $data);
	}

	public function create()
	{
		session();
		$data = [
			'title' => 'Form Surat Keluar',
			'validation' =>\Config\Services::validation()
		];

		return view('suratkeluar/form_sk', $data);
	}

	public function save()
	{

		if (!$this->validate([
			'no_sk' => [
				'label' => 'Nomor surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'penerima' => [
				'label' => 'Penerima',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'tgl_sk' => [
				'label' => 'Tanggal surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'file' => [
				'label' => 'File',
				'rules' => 'uploaded[file]|max_size[file,2048]|mime_in[file,image/jpg,image/png,application/pdf]',
				'errors' => [
					'uploaded' => '{field} tidak boleh kosong.',
					'max_size' => 'Ukuran file terlalu besar.',
					'mime_in' => 'Format file tidak sesuai.'
				]
			]

		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/tambah_sk')->withInput()->withInput('validation', $validation);
		}

		$fileSurat = $this->request->getFile('file');
		$namaSurat = $fileSurat->getRandomName();
		$fileSurat->move('assets/file', $namaSurat);


		$this->suratModel->save([
			'no_sk' => $this->request->getVar('no_sk'),
			'penerima' => $this->request->getVar('penerima'),
			'tgl_sk' => $this->request->getVar('tgl_sk'),
			'ktr_sk' => $this->request->getVar('ktr_sk'),
			'file' => $namaSurat
		]);
		session()->setFlashdata('pesan', 'Ditambahkan.');

		return redirect()->to('/suratkeluar');
	}

	public function delete($id)
	{

		$this->suratModel->delete($id);
		session()->setFlashdata('pesan', 'Dihapus.');
		return redirect()->to('/suratkeluar');
	}

	public function edit($id)
	{

		$data = [
			'title' => 'Form  Ubah Surat Masuk',
			'validation' => \Config\Services::validation(),
			'surat' => $this->suratModel->getSurat($id)
		];

		return view('suratkeluar/edit_sk', $data);
	}

	public function update($id)
	{
		if (!$this->validate([
			'no_sk' => [
				'label' => 'Nomor surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'penerima' => [
				'label' => 'Penerima',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'tgl_sk' => [
				'label' => 'Tanggal surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'file' => [
				'label' => 'File',
				'rules' => 'uploaded[file]|max_size[file,2048]|mime_in[file,image/jpg,image/png,application/pdf]',
				'errors' => [
					'uploaded' => '{field} tidak boleh kosong.',
					'max_size' => 'Ukuran file terlalu besar.',
					'mime_in' => 'Format file tidak sesuai.'
				]
			]

		])) {
			$validation = \Config\Services::validation();
			return redirect()->to("/suratkeluar/edit/$id")->withInput()->withInput('validation', $validation);
		}
		

		$fileSurat = $this->request->getFile('file');
		$namaSurat = $fileSurat->getRandomName();
		$fileSurat->move('assets/file', $namaSurat);
		$this->suratModel->save([
			'id' => $id,
			'no_sk' => $this->request->getVar('no_sk'),
			'penerima' => $this->request->getVar('penerima'),
			'tgl_sk' => $this->request->getVar('tgl_sk'),
			'ktr_sk' => $this->request->getVar('ktr_sk')
		]);
		session()->setFlashdata('pesan', 'Diubah.');

		return redirect()->to('/suratkeluar');
	}

	public function download($namefile)
	{
	
		return $this->response->download("assets/file/$namefile", null);
	}

	//--------------------------------------------------------------------
}
