<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployerRequests extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'auto_increment' => true],
            'employer_id'      => ['type' => 'INT'], // FK to users table
            'service_category' => ['type' => 'VARCHAR', 'constraint' => 255],
            'country_id'       => ['type' => 'INT'],
            'status'           => ['type' => 'ENUM', 'constraint' => ['pending', 'approved', 'rejected'], 'default' => 'pending'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('employer_requests');
    }


    public function down()
    {
        //
    }
}
