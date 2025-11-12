<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimbang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nik'       => ['type' => 'VARCHAR', 'constraint' => 20],
            'nama'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat'    => ['type' => 'TEXT'],
            'jenis'     => ['type' => 'ENUM("kertas","kardus")'],
            'berat'     => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'tanggal'   => ['type' => 'DATE'],
            'tukar'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('timbang');
    }

    public function down()
    {
        $this->forge->dropTable('timbang');
    }
}
