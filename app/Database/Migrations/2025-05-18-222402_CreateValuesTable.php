<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateValuesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'language'    => ['type' => 'VARCHAR', 'constraint' => 2], // 'en', 'ar'
            'title'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('values');
    }

    public function down()
    {
        $this->forge->dropTable('values');
    }
}
