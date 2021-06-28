<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'kelas' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'jurusan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'angkatan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'nis' => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'created_at DATETIME default CURRENT_TIMESTAMP',
			'updated_at DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
	]);
	$this->forge->addKey('id', TRUE);
	$this->forge->createTable('data_siswa');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('data_siswa');
	}
}
