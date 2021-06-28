<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiSuratModel extends Model
{
    protected $table = 'disposisi_sm';
    protected $allowedFields = ['no_sm', 'pengirim', 'tgl_sm', 'tgl_terima_sm', 'ktr_sm', 'file', 'kepada', 'tujuan', 'prihal', 'batas_tgl', 'sifat'];

    public function getSurat($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    
}
