<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePassportsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'auto_increment' => true],
            'user_id'        => ['type' => 'INT'],
            'number'         => ['type' => 'VARCHAR', 'constraint' => 100],
            'date_of_issue'  => ['type' => 'DATE'],
            'place_of_issue' => ['type' => 'VARCHAR', 'constraint' => 150],
            'date_of_expiry' => ['type' => 'DATE'],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jobseeker_passports');
    }

    public function down()
    {
        $this->forge->dropTable('jobseeker_passports');
    }
}
