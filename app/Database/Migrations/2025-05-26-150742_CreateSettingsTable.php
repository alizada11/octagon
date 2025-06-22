<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'type' => ['type' => 'VARCHAR', 'constraint' => 50], // e.g., 'footer'
            'key'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'value' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');
    }


    public function down()
    {
        //
    }
}
