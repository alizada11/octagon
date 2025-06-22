<?php
// Migration: 2024-05-19-000001_create_jobseeker_educations_table.php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobseekerEducationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'jobseeker_id' => ['type' => 'INT'],
            'degree'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'institution'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'start_year'   => ['type' => 'YEAR'],
            'end_year'     => ['type' => 'YEAR', 'null' => true],
            'description'  => ['type' => 'TEXT', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jobseeker_educations');
    }

    public function down()
    {
        $this->forge->dropTable('jobseeker_educations');
    }
}
