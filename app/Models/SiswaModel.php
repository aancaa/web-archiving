<?php namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'data_siswa';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nama', 'kelas', 'jurusan', 'angkatan', 'nis'];
    protected $useTimestamps = true;
}