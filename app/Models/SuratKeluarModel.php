<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table = 'tbl_sk';
    protected $allowedFields = ['no_sk','penerima','tgl_sk','ktr_sk','file'];

    public function getSurat($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        
        return $this->where(['id' => $id])->first();
    }
}