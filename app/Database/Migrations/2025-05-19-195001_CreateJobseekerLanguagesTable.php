<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobseekerLanguagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'jobseeker_id' => ['type' => 'INT'],
            'language'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'proficiency'  => ['type' => 'ENUM("Poor", "Fair", "Fluent")'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jobseeker_languages');
    }

    public function down()
    {
        $this->forge->dropTable('jobseeker_languages');
    }
}
