<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGoalTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'language'   => ['type' => 'VARCHAR', 'constraint' => 5],
            'heading'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'subheading' => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT'],
            'image'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('goal');
    }

    public function down()
    {
        //
    }
}
