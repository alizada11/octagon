<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShumusHero extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'heading1'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'heading2'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'image'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'language'   => ['type' => 'VARCHAR', 'constraint' => 2],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('shumus_hero');
    }

    public function down()
    {
        //
    }
}
