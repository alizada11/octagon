<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateViraSecionsTable extends Migration
{
    // app/Database/Migrations/2024-05-18-CreateViarSections.php
    // app/Database/Migrations/2024-05-18-CreateViarTable.php

    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'heading1' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'heading2' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'section' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'language' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('viar_sections');
    }



    public function down()
    {
        //
    }
}
