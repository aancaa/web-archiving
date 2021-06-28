<?php namespace App\Database\Seeds;

class DataSiswaSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->query("INSERT INTO data_siswa (nama, kelas, jurusan, angkatan, nis )
            VALUES ('andi','XI-IPA-1','IPA','2019','11223344'),
                    ('yudi','XI-IPS-2','IPS','2019','55667788');"
        );
    }
}