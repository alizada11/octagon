<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSliderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT'],
            'button_text' => ['type' => 'VARCHAR', 'constraint' => 100],
            'button_link' => ['type' => 'VARCHAR', 'constraint' => 255],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255],
            'language' => ['type' => 'VARCHAR', 'constraint' => 10], // en or ar
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('sliders');
    }

    public function down()
    {
        $this->forge->dropTable('sliders');
    }
}
