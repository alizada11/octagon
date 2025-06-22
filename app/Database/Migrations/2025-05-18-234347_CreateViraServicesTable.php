<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateViraServicesTable extends Migration
{
    // app/Database/Migrations/2024-05-18-CreateViarServices.php
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'icon'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'bullets'    => ['type' => 'TEXT'], // Stored as JSON
            'language'   => ['type' => 'VARCHAR', 'constraint' => 5],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('viar_services');
    }


    public function down()
    {
        //
    }
}
