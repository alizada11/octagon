<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContactDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT', 'auto_increment' => true],
            'icon'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'type'      => ['type' => 'ENUM', 'constraint' => ['email', 'phone', 'address', 'working_hours']],
            'title'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'value'     => ['type' => 'TEXT'],
            'language'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contact_details');
    }

    public function down()
    {
        //
    }
}
