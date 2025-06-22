<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobseekerSkillsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'jobseeker_id' => ['type' => 'INT'],
            'skill_name'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'level'        => ['type' => 'ENUM("Beginner", "Intermediate", "Advanced")'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jobseeker_skills');
    }

    public function down()
    {
        $this->forge->dropTable('jobseeker_skills');
    }
}
