<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShumusServices extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'icon'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'language'   => ['type' => 'VARCHAR', 'constraint' => 2],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('shumus_services');
    }


    public function down()
    {
        //
    }
}
