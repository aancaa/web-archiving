<?php

namespace App\Controllers;

use App\Models\DisposisiSuratModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class SuratMasuk extends BaseController
{
	protected $suratModel;
	public function __construct()
	{
		$this->suratModel = new DisposisiSuratModel();
	}

	public function printExcel()
	{
		$surat = new DisposisiSuratModel();
		$dataSurat = $surat->findAll();

		$spreadsheet = new Spreadsheet();
		// tulis header/nama kolom 
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No. Surat')
			->setCellValue('B1', 'Pengirim')
			->setCellValue('C1', 'Tanggal Surat Masuk')
			->setCellValue('D1', 'Tanggal Terima')
			->setCellValue('F1', 'Prihal')
			->setCellValue('G1', 'Kepada')
			->setCellValue('H1', 'Tujuan Disposisi');
		$column = 2;
		// tulis data mobil ke cell
		foreach ($dataSurat as $data) {
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $column, $data['no_sm'])
				->setCellValue('B' . $column, $data['pengirim'])
				->setCellValue('C' . $column, $data['tgl_sm'])
				->setCellValue('D' . $column, $data['tgl_terima_sm'])
				->setCellValue('F' . $column, $data['prihal'])
				->setCellValue('G' . $column, $data['kepada'])
				->setCellValue('H' . $column, $data['tujuan']);
			$column++;
		}
		// tulis dalam format .xlsx
		$writer = new Xlsx($spreadsheet);
		$fileName = 'Data Surat Masuk';

		// Redirect hasil generate xlsx ke web client
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}






	public function suratmasuk()
	{
		$curentPage = $this->request->getVar('page_disposisi_sm') ? $this->request->getVar('page_disposisi_sm') : 1;
		$data = [
			'title' => 'Surat Masuk',
			'surat' => $this->suratModel->getSurat(),
			'surat' => $this->suratModel->paginate(5, 'disposisi_sm'),
			'pager' => $this->suratModel->pager,
			'currentPage' => $curentPage
		];

		return view('suratmasuk/sm', $data);
	}


	public function detail($id)
	{
		$surat = $this->suratModel->getSurat($id);
		$data = [
			'title' => 'Detail Surat Masuk',
			'surat' => $surat
		];
		return view('suratmasuk/detail_sm', $data);
	}

	public function create()
	{
		session();
		$data = [
			'title' => 'Form Surat Masuk',
			'validation' => \Config\Services::validation()
		];

		return view('suratmasuk/form_sm', $data);
	}

	public function save()
	{

		if (!$this->validate([
			'no_sm' => [
				'label' => 'Nomor surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'pengirim' => [
				'label' => 'Pengirim',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'tgl_sm' => [
				'label' => 'Tanggal surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'tgl_terima_sm' => [
				'label' => 'Tanggal Diterima',
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
			return redirect()->to('/tambah_sm')->withInput()->withInput('validation', $validation);
		}

		$fileSurat = $this->request->getFile('file');
		$namaSurat = $fileSurat->getRandomName();
		$fileSurat->move('assets/file', $namaSurat);


		$this->suratModel->save([
			'no_sm' => $this->request->getVar('no_sm'),
			'pengirim' => $this->request->getVar('pengirim'),
			'tgl_sm' => $this->request->getVar('tgl_sm'),
			'tgl_terima_sm' => $this->request->getVar('tgl_terima_sm'),
			'ktr_sm' => $this->request->getVar('ktr_sm'),
			'file' => $namaSurat
		]);
		session()->setFlashdata('pesan', 'Ditambahkan.');

		return redirect()->to('/suratmasuk');
	}
	//go to disposisi
	public function detail_disposisi($id)
	{

		$data = [
			'title' => 'Form  Disposisi',
			'surat' => $this->suratModel->getSurat($id)
		];

		return view('disposisi/detail_disposisi', $data);
	}
	//go to form disposisi
	public function form_disposisi($id)
	{

		$data = [
			'title' => 'Form  Disposisi',
			'surat' => $this->suratModel->getSurat($id)
		];

		return view('disposisi/form_disposisi', $data);
	}
	// to save deposisi data
	public function disposisi($id)
	{

		$this->suratModel->save([
			'id' => $id,
			'kepada' => $this->request->getVar('kepada'),
			'tujuan' => $this->request->getVar('tujuan'),
			'prihal' => $this->request->getVar('prihal'),
			'batas_tgl' => $this->request->getVar('batas_tgl'),
			'sifat' => $this->request->getVar('sifat'),

		]);

		return redirect()->to('/suratmasuk');
	}
	//to delete data surat
	public function delete($id)
	{

		$this->suratModel->delete($id);
		session()->setFlashdata('pesan', 'Dihapus.');
		return redirect()->to('/suratmasuk');
	}
	//to edit  surat main content
	public function edit($id)
	{

		$data = [
			'title' => 'Form  Ubah Surat Masuk',
			'validation' => \Config\Services::validation(),
			'surat' => $this->suratModel->getSurat($id)
		];

		return view('suratmasuk/edit_sm', $data);
	}

	//to update  surat main content
	public function update($id)
	{

		if (!$this->validate([
			'no_sm' => [
				'label' => 'Nomor surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'pengirim' => [
				'label' => 'Pengirim',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'tgl_sm' => [
				'label' => 'Tanggal surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.'
				]
			],
			'tgl_terima_sm' => [
				'label' => 'Tanggal Diterima',
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
			return redirect()->to("/suratmasuk/edit/$id")->withInput()->withInput('validation', $validation);
		}

		$fileSurat = $this->request->getFile('file');
		$namaSurat = $fileSurat->getRandomName();
		$fileSurat->move('assets/file', $namaSurat);

		$this->suratModel->save([
			'id' => $id,
			'no_sm' => $this->request->getVar('no_sm'),
			'pengirim' => $this->request->getVar('pengirim'),
			'tgl_sm' => $this->request->getVar('tgl_sm'),
			'tgl_terima_sm' => $this->request->getVar('tgl_terima_sm'),
			'ktr_sm' => $this->request->getVar('ktr_sm'),
			'file' => $namaSurat
		]);
		session()->setFlashdata('pesan', 'Diubah.');

		return redirect()->to('/suratmasuk');
	}

	//to download file
	public function download($namefile)
	{

		return $this->response->download("assets/file/$namefile", null);
	}

	//to print pdf
	function htmlToPDF($id)
	{
		$surat = $this->suratModel->getSurat($id);
		$data = [
			'surat' => $surat
		];
		$dompdf = new \Dompdf\Dompdf();
		$dompdf->loadHtml(view('pdfprint/print', $data));
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream("disposisi");
	}



	//--------------------------------------------------------------------
}
